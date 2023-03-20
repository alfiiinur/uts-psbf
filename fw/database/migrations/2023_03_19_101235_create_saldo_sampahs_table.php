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
        Schema::create('saldo_sampahs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('jenis_sampah');
            $table->string('berat_sampah');
            $table->string('harga_sampah');
            $table->date('tanggal');
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
        Schema::dropIfExists('saldo_sampahs');
    }
};
