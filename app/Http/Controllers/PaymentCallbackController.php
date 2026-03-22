<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentCallbackController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
    }

    public function handleNotification(Request $request)
    {
        try {
            $notification = new Notification();
        } catch (\Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());
            return response()->json(['message' => 'Invalid notification'], 400);
        }

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;
        $paymentType = $notification->payment_type;
        $fraudStatus = $notification->fraud_status;

        // gateway_order_id in our DB matches $orderId
        $payment = Payment::where('gateway_order_id', $orderId)->first();

        if (!$payment) {
            Log::warning('Midtrans Callback Error: Payment record not found for ' . $orderId);
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Save raw response for debugging/reconciliation
        $payment->raw_response = $notification->getResponse();
        $payment->payment_type = $paymentType;

        $order = $payment->order;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $payment->status = 'pending';
            } else if ($fraudStatus == 'accept') {
                $payment->status = 'capture';
                $order->payment_status = 'paid';
            }
        } else if ($transactionStatus == 'settlement') {
            $payment->status = 'settlement';
            $payment->paid_at = now();
            $order->payment_status = 'paid';
            $order->status = ($order->reservation_id) ? 'confirmed' : 'processing'; // Or whatever status is appropriate
        } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $payment->status = $transactionStatus;
            $order->payment_status = 'unpaid';
            // Optionally, restore stock here if the order is cancelled.
        } else if ($transactionStatus == 'pending') {
            $payment->status = 'pending';
        }

        $payment->save();
        $order->save();

        return response()->json(['message' => 'Notification handled']);
    }
}
