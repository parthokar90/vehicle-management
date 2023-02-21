<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('staff_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('contact_one')->nullable();
            $table->string('contact_two')->nullable();
            $table->date('date_of_birth');
            $table->string('nid_no');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->unsignedBigInteger('staff_type')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('previous_organisation')->nullable();
            $table->unsignedBigInteger('assigned_vehicle')->nullable();
            $table->string('profile_photo')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('vehicle_staff');
    }
}
