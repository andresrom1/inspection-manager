<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('taker_id');
            $table->string('policyNumber');
            $table->string('company');
            $table->integer('installments')->nullable();
            $table->string('insuranceObject');
            $table->timestamp('fromDate')->nullable();
            $table->timestamp('toDate')->nullable();
            $table->string('policyUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
};
