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
        Schema::create('konversis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sampah_plastik_id');
            $table->integer('total_weight');
            $table->string('satuan');
            $table->string('recovery_factor');
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
        Schema::dropIfExists('konversis');
    }
};
