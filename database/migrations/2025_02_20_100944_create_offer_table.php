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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->decimal('offer_price', 10, 2);
            $table->integer('price');
            $table->text('message')->nullable();
            $table->string('seller_name');
            $table->unsignedBigInteger('seller_id');
            $table->integer('product_id');
            $table->string('product_image');
            $table->string('product_name');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
