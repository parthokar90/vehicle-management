<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('plate_no');
            $table->unsignedBigInteger('type')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('year');
            $table->string('engine_no');
            $table->string('milage')->nullable();
            $table->unsignedBigInteger('owner_ship');
            $table->string('photo');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('status');
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
        Schema::dropIfExists('vehicles');
    }
}
