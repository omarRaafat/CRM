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
        //First Name- Last Name – Job title - Address Line 1- Address Line 2 
        // – City – Post code – Country - Work Telephone – Mobile Telephone
        // - Email Address

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_title');
            $table->text('address_line_1');
            $table->text('address_line_2');
            $table->string('city');
            $table->bigInteger('post_code');
            $table->string('country');
            $table->text('work_telephone');
            $table->text('mobile_telephone');
            $table->string('email')->unique();
            $table->string('status');
            $table->string('prefix');
            $table->foreignId('client_id');
            $table->foreign('client_id')
            ->references('id')
            ->on('clients');
            $table->string('social_profiles')->unique(); 
            $table->string('tags');
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
        Schema::dropIfExists('contacts');
    }
};
