<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_level', function (Blueprint $table) {
            $table->unsignedInteger('id')->index()->autoIncrement();
            $table->dropPrimary( 'id' );

            $table->uuid('uuid');


            $table->dateTime('time', 6)->default(DB::raw('CLOCK_TIMESTAMP()'));
            // $table->default(DB::raw('NOW()'));
            // $table->string('water_level', 80)->nullable();

            $table->float('water_level');


            // $table->timestamp("time")->default(DB::raw('CLOCK_TIMESTAMP()'));





            $table->primary('time');

            $table->string('tags', 80)->nullable();

            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_level');
    }
}
