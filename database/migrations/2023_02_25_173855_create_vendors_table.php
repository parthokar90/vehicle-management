<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_type');
            $table->string('vendor_name');
            $table->string('company_name');
            $table->unsignedBigInteger('division');
            $table->unsignedBigInteger('district');
            $table->unsignedBigInteger('thana');
            $table->string('nid_no');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('sms_phone');
            $table->string('emergency_phone')->nullable();
            $table->string('contact_one');
            $table->string('contact_two')->nullable();
            $table->string('contact_email');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('company_address')->nullable();
            $table->text('short_note')->nullable();
            $table->date('account_opening_date');
            $table->string('reporter')->nullable();
            $table->string('follower')->nullable();
            $table->text('account_note')->nullable();
            $table->string('global_status');
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
        Schema::dropIfExists('vendors');
    }
}
