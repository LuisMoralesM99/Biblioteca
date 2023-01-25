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
        Schema::create('prestamos', function (Blueprint $table){
            $table->id();
            $table->string('estado');
            $table->dateTime('fec_salida');
            $table->dateTime('fec_devolucion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('libro_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('usuarios');

            $table->foreign('libro_id')
            ->references('id')
            ->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
