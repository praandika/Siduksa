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
        Schema::create('sampah_plastiks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->float('stock');
            $table->integer('price_kg');
            $table->integer('price_gram');
            $table->integer('price_pcs');
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
        Schema::dropIfExists('sampah_plastiks');
    }
};
