<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->decimal('weight', 8, 2);
            $table->decimal('total_price', 10, 2)->nullable();
            $table->date('order_date');
            $table->date('pickup_date')->nullable();
            $table->enum('status', ['Masuk', 'Dicuci', 'Siap Diambil'])->default('Masuk');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
