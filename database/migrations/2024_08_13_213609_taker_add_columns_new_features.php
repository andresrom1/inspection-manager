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
        Schema::table('takers', function (Blueprint $table) {
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('adress')->nullable();
            $table->string('postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('takers', function (Blueprint $table) {
            $table->dropColumn('id_type');
            $table->dropColumn('id_number');
            $table->dropColumn('adress');
            $table->dropColumn('postal_code');
        });
    }
};
