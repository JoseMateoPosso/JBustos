<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('tokens')->nullable();
            $table->decimal('dollars',10,2);
            $table->date('sales_date');
            $table->bigInteger('page_id')->unsigned();
            $table->bigInteger('sede_id')->unsigned();
            $table->bigInteger('model_id')->unsigned();
            $table->bigInteger('nick_id')->unsigned();
            $table->bigInteger('consolidate_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('nick_id')->references('id')->on('nicks');
            $table->foreign('consolidate_id')->references('id')->on('sales_consolidates');
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
        Schema::dropIfExists('sales');
    }
}
