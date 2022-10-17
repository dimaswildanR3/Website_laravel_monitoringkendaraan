<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('driver_id')->unique();
            $table->date('pemakaian');
            $table->date('pengembalian');
            $table->enum('persetujuan', ['setuju', 'tidak_setuju'])->default('tidak_setuju');
            $table->timestamps();

            $table->foreign('driver_id')->references('driver_id')->on('driver');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_kendaraan');
    }
}
