<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_classification');
            $table->string('brand_name');
            $table->string('dosage');
            $table->string('source');
            $table->integer('beginning_stock');
            $table->integer('maintaining_level');
            $table->integer('critical_level');
            $table->date('expiration_date');
            $table->string('remarks');

            //category foreign key
            //stand as Type of medicine
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('medicine_categories');
            
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
        Schema::dropIfExists('medicines');
    }
}
