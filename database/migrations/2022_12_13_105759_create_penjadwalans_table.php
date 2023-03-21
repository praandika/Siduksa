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
        Schema::create('penjadwalans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mesin_id')->nullable();
            $table->unsignedInteger('sampah_plastik_id');
            $table->string('recovery_factor')->nullable();
            $table->float('first_stock');
            $table->float('last_stock');
            $table->dateTime('date_stock_in');
            $table->dateTime('date_stock_out')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('penjadwalans');
    }
};
