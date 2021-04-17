<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->integer('areaid');
            $table->integer('dailydose1');
            $table->integer('dailydose2');
            $table->integer('daydiff');
            $table->integer('daytotal');
            $table->dateTime('referencedate');
            $table->integer('totaldistinctpersons');
            $table->integer('totaldose1');
            $table->integer('totaldose2');
            $table->integer('totalvaccinations');
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
        Schema::dropIfExists('districts');
    }
}
