<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void
    {
        Schema::create('document_products' , function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price' , 8 , 2);
            $table->decimal('total_price' , 8 , 2);
            $table->text('description')->nullable();
            $table->string('product_id_name');
            $table->string('order_id_name');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void
    {
        Schema::dropIfExists('document_product');
    }
};
