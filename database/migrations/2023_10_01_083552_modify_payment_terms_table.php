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
        Schema::table('payment_terms', function (Blueprint $table) {
            $table->float('skonto_percent')->nullable()->after('terms');
            $table->integer('skonto_days')->nullable()->after('skonto_percent');
            $table->integer('payment_window')->nullable()->after('skonto_days');
            $table->float('vat')->nullable()->after('payment_window');
            $table->string('vat_number')->nullable()->after('vat');

            $table->dropColumn('payment_method');
            $table->dropColumn('terms');
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
