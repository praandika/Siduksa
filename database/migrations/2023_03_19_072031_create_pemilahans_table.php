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
        Schema::create('pemilahans', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->unsignedInteger('sampah_plastik_id');
            $table->float('total_weight');
            $table->string('satuan');
            $table->float('waste_trash')->nullable();
            $table->integer('harga');
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
        Schema::dropIfExists('pemilahans');
    }
};
