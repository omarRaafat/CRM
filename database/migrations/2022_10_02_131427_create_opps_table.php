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
        Schema::create('opps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('size');
            $table->dateTime('date_of_opp');
            $table->date('closing_date');
            $table->text('clients');
            $table->text('contacts');
            $table->text('status');
            $table->text('source');
            $table->text('percentage');
            $table->double('cost');
            $table->double('selling_price');
            $table->string('quota');
            $table->foreignId('owner');
            $table->foreign('owner')->references('id')->on('users');
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
        Schema::dropIfExists('opps');
    }
};
