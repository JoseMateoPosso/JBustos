<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_monitors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('initial_date');
            $table->date('final_date')->nullable();
            $table->bigInteger('model_id')->unsigned();
            $table->bigInteger('monitor_id')->unsigned();

            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('monitor_id')->references('id')->on('monitors');

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
        Schema::dropIfExists('models_monitors');
    }
}
