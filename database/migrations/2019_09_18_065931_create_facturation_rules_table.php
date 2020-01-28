<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturationRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturation_rules', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('init_date');
            $table->date('final_date')->nullable();
            $table->decimal('minimun',10,2)->nullable();
            $table->decimal('maximum',10,2)->nullable();
            $table->integer('percentage')->nullable();
            $table->decimal('trm',10,2)->nullable();
            $table->bigInteger('page_id')->nullable()->unsigned();
            $table->bigInteger('model_id')->nullable()->unsigned();
            $table->bigInteger('sede_id')->nullable()->unsigned();
            $table->bigInteger('studio_id')->nullable()->unsigned();
            $table->integer('status_id')->nullable()->unsigned();
            $table->bigInteger('location_id')->nullable()->unsigned();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('facturation_rules');
    }
}
