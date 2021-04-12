<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('data')) {
            Schema::create('data', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('sensor_id')->unsigned();
                $table->float('value');
                $table->timestamps();
            });
        }

        Schema::table('data', function (Blueprint $table) {

            $table->foreign('sensor_id')->references('id')->on('sensor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
