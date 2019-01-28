<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails_time_slots', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('email_id');
            $table->unsignedInteger('time_slot_id');

            $table->foreign('email_id')->references('id')->on('emails');
            $table->foreign('time_slot_id')->references('id')->on('time_slots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails_time_slots');
    }
}
