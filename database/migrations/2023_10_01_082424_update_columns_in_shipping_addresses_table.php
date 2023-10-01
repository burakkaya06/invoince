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
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->renameColumn('address_line_1', 's_street_adress');
            $table->renameColumn('address_line_2', 's_additional_line');
            $table->renameColumn('postal_code', 's_zip_code');
            $table->renameColumn('city', 's_city');
            $table->renameColumn('state', 's_state');
            $table->renameColumn('country', 's_country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_addresses', function (Blueprint $table) {
            //
        });
    }
};
