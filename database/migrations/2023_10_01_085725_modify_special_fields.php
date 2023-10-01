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
        Schema::table('special_fields', function (Blueprint $table) {
            $table->dropColumn('field_name');
            $table->dropColumn('field_value');

            $table->string('custom_fields1')->nullable();
            $table->string('custom_fields2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
