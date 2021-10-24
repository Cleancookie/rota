<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTimeslotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_timeslot', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('staff_id')->index()->nullable();
            $table->foreign('staff_id')->references('id')->on('staff');

            $table->unsignedBigInteger('timeslot_id')->index()->nullable();
            $table->foreign('timeslot_id')->references('id')->on('timeslots');

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
        Schema::dropIfExists('staff_timeslot');
    }
}
