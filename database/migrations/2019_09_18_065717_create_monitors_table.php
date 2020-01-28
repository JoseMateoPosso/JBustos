<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('identification',100);
            $table->string('name',100);
            $table->string('lastname',100);
            $table->string('address',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('cellphone',100)->nullable();
            $table->date('admission_date')->nullable();
            $table->json('properties')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->bigInteger('eps_id')->unsigned()->nullable();
            $table->bigInteger('afp_id')->unsigned()->nullable();
            $table->bigInteger('ccf_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('eps_id')->references('id')->on('basic_information');
            $table->foreign('afp_id')->references('id')->on('basic_information');
            $table->foreign('ccf_id')->references('id')->on('basic_information');
            $table->foreign('city_id')->references('id')->on('locations');
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
        Schema::dropIfExists('monitors');
    }
}
