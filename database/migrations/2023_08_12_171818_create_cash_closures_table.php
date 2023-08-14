<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashClosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_closures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('turn',['PRIMER TURNO','SEGUNDO TURNO', 'COMPLETO']);
            $table->decimal('cash',10,2)->default(0);
            $table->decimal('rappi',10,2)->default(0);
            $table->decimal('terminal',10,2)->default(0);
            $table->decimal('expenses',10,2)->default(0);
            $table->decimal('tips',10,2)->default('0');
            $table->string('notes',1023)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_closures');
    }
}
