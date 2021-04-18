<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_vaccinations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('district_id')->constrained();
            
            $table->integer('daily_dose_1');
            $table->integer('daily_dose_2');
            $table->integer('day_difference');
            $table->integer('day_total');
            $table->dateTime('reference_date');
            
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
        Schema::dropIfExists('daily_vaccinations');
    }
}
