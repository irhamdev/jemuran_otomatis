<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->float('suhu')->nullable();
            $table->float('kelembaban')->nullable();
            $table->integer('hujan')->nullable();
            $table->integer('gelap')->nullable();
            $table->integer('status_jemur')->nullable();
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
        Schema::dropIfExists('log_monitorings');
    }
}
