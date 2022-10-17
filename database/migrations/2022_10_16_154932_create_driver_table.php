<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->id('driver_id');
            $table->string('name');
            $table->enum('jeniskendaraan', ['angkutan orang','angkutan barang']);
            $table->string('mobil');
            $table->enum('bahanbakar', ['pertalite', 'pertamax','pertamaxturbo']);
        
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
        Schema::dropIfExists('driver');
    }
}
