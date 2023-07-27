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
        Schema::create('transacctions', function (Blueprint $table) {
            $table->id();
            $table->integer('amount_of_money');
            $table->unsignedBigInteger('remitent');
            $table->unsignedBigInteger('destinatary');

            $table->foreign('remitent')->references('id')->on('users');
            $table->foreign('destinatary')->references('id')->on('users');

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
        Schema::dropIfExists('transacctions');
    }
};
