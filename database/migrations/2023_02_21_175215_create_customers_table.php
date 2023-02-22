<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_group');
            $table->string('employee')->nullable();
            $table->string('customer_name');
            $table->string('company_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth');
            $table->unsignedBigInteger('division');
            $table->unsignedBigInteger('district');
            $table->unsignedBigInteger('thana');
            $table->string('nid_no');
            $table->string('gender')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('billing_address');
            $table->string('sms_phone');
            $table->string('emergency_phone')->nullable();
            $table->string('contact_one');
            $table->string('contact_two')->nullable();
            $table->string('contact_email');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('company_address')->nullable();
            $table->text('short_note')->nullable();
            $table->string('platform_username');
            $table->string('platform_password');
            $table->string('system_username');
            $table->string('system_password');
            $table->string('customer_due_limit');
            $table->string('collection_method');
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
        Schema::dropIfExists('customers');
    }
}
