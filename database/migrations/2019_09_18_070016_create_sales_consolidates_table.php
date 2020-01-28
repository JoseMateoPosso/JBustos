<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesConsolidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_consolidates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->decimal('total_paid',10,2);
            $table->decimal('total_paid_sede',10,2)->nullable();
            $table->decimal('total_dollars',10,2);
            $table->integer('percentage_paid');
            $table->integer('percentage_sede')->nullable();
            $table->integer('total_tokens')->nullable();
            $table->decimal('paid',10,2)->nullable();
            $table->decimal('paid_sede',10,2)->nullable();
            $table->decimal('trm',10,2)->nullable();
            $table->date('facturation_date')->nullable();
            $table->date('initial_date');
            $table->date('final_date');
            $table->bigInteger('rule_id')->unsigned()->nullable();
            $table->bigInteger('page_id')->unsigned();
            $table->bigInteger('model_id')->unsigned();
            $table->bigInteger('sede_id')->unsigned();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->foreign('rule_id')->references('id')->on('facturation_rules');
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
        Schema::dropIfExists('sales_consolidates');
    }
}
