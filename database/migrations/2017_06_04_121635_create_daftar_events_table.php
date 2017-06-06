<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_event');
            $table->string('id_user');
            $table->string('keterangan_pendaftaran')->nullable();
            $table->string('status_pendaftaran')->default(0);
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
        Schema::dropIfExists('daftar_events');
    }
}
