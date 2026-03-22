<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // Midtrans info
            $table->string('payment_gateway')->default('midtrans');
            $table->string('gateway_order_id')->nullable()->index();      // Midtrans order_id
            $table->string('gateway_transaction_id')->nullable();          // Midtrans transaction_id
            $table->string('snap_token')->nullable();                      // Midtrans snap token
            $table->string('redirect_url')->nullable();

            // Detail pembayaran
            $table->decimal('amount', 12, 2);
            $table->string('payment_method')->nullable();                  // va_bca, va_bni, qris, gopay, dll
            $table->string('payment_type')->nullable();                    // bank_transfer, qris, e-wallet, dll

            // VA / QRIS info
            $table->string('va_number')->nullable();
            $table->string('payment_code')->nullable();

            // Status
            $table->enum('status', [
                'pending',      // menunggu pembayaran
                'settlement',   // pembayaran berhasil (Midtrans)
                'capture',      // pembayaran berhasil (credit card)
                'deny',         // ditolak
                'cancel',       // dibatalkan
                'expire',       // kadaluarsa
                'refund',       // dikembalikan
            ])->default('pending');

            // Waktu
            $table->dateTime('expires_at')->nullable();    // countdown timer 24 jam
            $table->dateTime('paid_at')->nullable();

            // Invoice
            $table->string('pdf_url')->nullable();         // URL invoice PDF

            // Raw callback response dari Midtrans
            $table->json('raw_response')->nullable();

            $table->timestamps();

            // Index untuk reconciliation
            $table->index('status');
            $table->index('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
