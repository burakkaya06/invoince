<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE shipping_addresses ENGINE=InnoDB');
        DB::statement('ALTER TABLE invoice_addresses ENGINE=InnoDB');
        DB::statement('ALTER TABLE payment_terms ENGINE=InnoDB');
        DB::statement('ALTER TABLE special_fields ENGINE=InnoDB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('innodb', function (Blueprint $table) {
            //
        });
    }
};
