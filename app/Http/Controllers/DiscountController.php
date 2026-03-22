<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::orderBy('valid_until', 'desc')->get();

        return view('discount.index', compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'type'                => 'required|in:percentage,fixed',
            'code'                => 'required|string|max:50|unique:discounts,code',
            'description'         => 'nullable|string|max:1000',
            'percentage'          => 'required_if:type,percentage|nullable|numeric|min:0|max:100',
            'amount'              => 'required_if:type,fixed|nullable|numeric|min:0',
            'valid_from'          => 'required|date',
            'valid_until'         => 'required|date|after:valid_from',
            'is_active'           => 'nullable|boolean',
            'min_order_amount'    => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit'         => 'nullable|integer|min:1',
            'usage_per_user'      => 'nullable|integer|min:1',
            'banner_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_banner'           => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_banner'] = $request->has('is_banner');
        $validated['percentage'] = $validated['percentage'] ?? 0;
        $validated['amount'] = $validated['amount'] ?? 0;
        $validated['usage_per_user'] = $validated['usage_per_user'] ?? 1;

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('discounts', 'public');
        }

        Discount::create($validated);

        return redirect()->back()->with('success', 'Diskon berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'type'                => 'required|in:percentage,fixed',
            'code'                => 'required|string|max:50|unique:discounts,code,' . $discount->id,
            'description'         => 'nullable|string|max:1000',
            'percentage'          => 'required_if:type,percentage|nullable|numeric|min:0|max:100',
            'amount'              => 'required_if:type,fixed|nullable|numeric|min:0',
            'valid_from'          => 'required|date',
            'valid_until'         => 'required|date|after:valid_from',
            'is_active'           => 'nullable|boolean',
            'min_order_amount'    => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit'         => 'nullable|integer|min:1',
            'usage_per_user'      => 'nullable|integer|min:1',
            'banner_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_banner'           => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_banner'] = $request->has('is_banner');
        $validated['percentage'] = $validated['percentage'] ?? 0;
        $validated['amount'] = $validated['amount'] ?? 0;
        $validated['usage_per_user'] = $validated['usage_per_user'] ?? 1;

        if ($request->hasFile('banner_image')) {
            if ($discount->banner_image) {
                Storage::disk('public')->delete($discount->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('discounts', 'public');
        }

        $discount->update($validated);

        return redirect()->back()->with('success', 'Diskon berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        if ($discount->banner_image) {
            Storage::disk('public')->delete($discount->banner_image);
        }

        $discount->delete();

        return redirect()->back()->with('success', 'Diskon berhasil dihapus!');
    }

    /**
     * Validate a promo code via AJAX and return calculated discount.
     */
    public function validatePromo(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $discount = Discount::where('code', $request->code)->first();

        if (!$discount) {
            return response()->json(['error' => 'Kode promo tidak valid.'], 404);
        }

        if (!$discount->is_active) {
            return response()->json(['error' => 'Kode promo sudah tidak aktif.'], 400);
        }

        if (now()->lt($discount->valid_from) || now()->gt($discount->valid_until)) {
            return response()->json(['error' => 'Kode promo sudah expired.'], 400);
        }

        if ($discount->min_order_amount > 0 && $request->subtotal < $discount->min_order_amount) {
            return response()->json(['error' => 'Subtotal pesanan tidak mencapai batas minimum (Rp ' . number_format($discount->min_order_amount, 0, ',', '.') . ').'], 400);
        }

        if ($discount->usage_limit !== null && $discount->used_count >= $discount->usage_limit) {
            return response()->json(['error' => 'Kode promo telah mencapai batas penggunaan.'], 400);
        }

        // Calculation
        $discountAmount = 0;
        if ($discount->type === 'percentage') {
            $discountAmount = ($discount->percentage / 100) * $request->subtotal;
            if ($discount->max_discount_amount > 0) {
                $discountAmount = min($discountAmount, $discount->max_discount_amount);
            }
        } else {
            $discountAmount = $discount->amount;
        }

        // Ensure not exceeding subtotal
        $discountAmount = min($discountAmount, $request->subtotal);

        return response()->json([
            'success' => true,
            'discount' => [
                'id' => $discount->id,
                'code' => $discount->code,
                'type' => $discount->type,
                'calculated_discount' => $discountAmount,
            ],
            'message' => 'Kode promo berhasil diaplikasikan!'
        ]);
    }
}
