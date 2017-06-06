<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeteranganIkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_ikas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jumlah_anggota')->default(0);
            $table->string('jumlah_event')->default(0);
            $table->string('jumlah_angkatan')->default(0);
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
        Schema::dropIfExists('keterangan_ikas');
    }
}
