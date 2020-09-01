<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seatLimit')->nullabel(false);
            $table->integer('oldSeatLimit')->nullabel(false);
            $table->float('dailyValue')->nullabel(false);
            $table->integer('oldDailyValue')->nullabel(false);
            $table->string('colorMonday')->nullabel(false);
            $table->string('colorTuesday')->nullabel(false);
            $table->string('colorWednesday')->nullabel(false);
            $table->string('colorThursday')->nullabel(false);
            $table->string('colorFriday')->nullabel(false);
            $table->string('colorSaturday')->nullabel(false);
            $table->string('colorSunday')->nullabel(false);
            $table->string('colorOuther')->nullabel(false);

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
        Schema::dropIfExists('campings');
    }
}
