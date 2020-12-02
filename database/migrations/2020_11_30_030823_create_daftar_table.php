<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nama");
            $table->string("tgl_lahir");
            $table->string("alamat");
            $table->string("jenis_kelamin");
            $table->string("gejala");
            $table->string("no_antrian");
            $table->string("tgl_periksa");
            $table->string("obat");
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
        Schema::dropIfExists('daftar');
    }
}
