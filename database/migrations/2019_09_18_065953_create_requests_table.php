<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nickname_orig')->nullable();
            $table->string('nickname_suggest')->nullable();
            $table->text('observation')->nullable();
            $table->bigInteger('page_id')->unsigned()->nullable();
            $table->bigInteger('sede_id_orig')->unsigned()->nullable();
            $table->bigInteger('sede_id_dest')->unsigned()->nullable();
            $table->bigInteger('nick_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('sede_id_orig')->references('id')->on('sedes');
            $table->foreign('sede_id_dest')->references('id')->on('sedes');
            $table->foreign('nick_id')->references('id')->on('nicks');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('requests');
    }
}
