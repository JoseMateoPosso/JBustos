<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('value');
            $table->bigInteger('parameter_id')->unsigned();
            $table->bigInteger('sedes_id')->unsigned();

            $table->foreign('parameter_id')->references('id')->on('parameters');
            $table->foreign('sedes_id')->references('id')->on('sedes');

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
        Schema::dropIfExists('parameters_values');
    }
}
