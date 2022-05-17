<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_interventions', function (Blueprint $table) {
            $table->id();
            $table->string('medicine')->nullable();
            $table->integer('med_qty')->nullable();
            $table->string('supply')->nullable();
            $table->integer('supply_qty')->nullable();
            $table->string('action');
            $table->integer('clinic_rest_num_of_mins')->nullable();
            $table->string('clinic_rest_approve_by')->nullable();
            $table->string('sent_to_home_approve_by')->nullable();
            $table->string('sent_to_emer_approve_by')->nullable();
            $table->string('sent_to_emer_refusal')->nullable();
            $table->string('sent_to_emer_refuse_witness')->nullable();
            $table->string('sent_to_emer_refuse_waiver')->nullable();
            $table->string('other_intervention_info')->nullable();

            //patient foreign key
            $table->unsignedBigInteger('consultation_id');
            $table->foreign('consultation_id')->references('id')->on('consultations');
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
        Schema::dropIfExists('doctor_interventions');
    }
}
