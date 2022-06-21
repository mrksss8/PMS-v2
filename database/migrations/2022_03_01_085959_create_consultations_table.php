
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {

            $table->id();

            //
            $table->string('severe');
            
            //vitals signs
            $table->string('blood_pressure');
            $table->string('temperature');
            $table->string('respiratory_rate');
            $table->string('capillary_refill');
            $table->string('weight');
            $table->string('pulse_rate');

            //sign and Symptoms
            $table->string('onset')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->nullable();
            $table->string('character')->nullable();
            $table->string('aggravating_factor')->nullable();
            $table->string('radiation')->nullable();
            $table->string('time')->nullable();
            $table->string('severity')->nullable();
            $table->string('doctor')->nullable();

            //patient foreign key
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');


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
        Schema::dropIfExists('consultations');
    }
}
