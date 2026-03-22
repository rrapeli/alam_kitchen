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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');

            // Snapshot data menu saat order (harga bisa berubah di kemudian hari)
            $table->string('menu_name');
            $table->decimal('unit_price', 10, 2);

            $table->integer('quantity');
            $table->decimal('subtotal', 12, 2);
            $table->text('notes')->nullable(); // catatan khusus per item

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
