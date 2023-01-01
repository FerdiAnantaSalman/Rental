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
        Schema::create('sopir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_sopir');
            $table->string('nm_sopir');
            $table->string('nohp');
            $table->string('gender');
            $table->text('alamat');
            $table->text('ket');

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
        Schema::dropIfExists('sopir');
    }
};
