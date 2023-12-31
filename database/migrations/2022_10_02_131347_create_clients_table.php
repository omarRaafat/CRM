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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website');
            $table->string('industry');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->bigInteger('post_code');
            $table->string('country');
            $table->text('main_telephone');
            $table->text('secondary_telephone');
            $table->text('main_email_address');
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
        Schema::dropIfExists('clients');
    }
};
