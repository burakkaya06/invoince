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
        Schema::table('documents' , function (Blueprint $table) {
            $table->date('creation_date');
            $table->date('delivery_date');
            $table->decimal('total_amount' , 8 , 2);
            $table->decimal('total_amount_net' , 8 , 2);
            $table->decimal('total_vat' , 8 , 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void
    {
        //
    }
};
