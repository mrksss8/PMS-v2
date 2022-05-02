<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineConsumedByDeptView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createView());
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW medicine_consumed_by_dept AS
                -- SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
                SELECT patients.last_name, patients.first_name, patients.middle_name, departments.department, doctor_interventions.medicine, doctor_interventions.med_qty, SUM(doctor_interventions.med_qty) AS Total_medicine
                FROM patients
                INNER JOIN departments ON patients.department_id = departments.id
                INNER JOIN consultations ON consultations.patient_id = patients.id
                INNER JOIN doctor_interventions ON doctor_interventions.consultation_id = consultations.id
                GROUP BY departments.department;

            SQL;
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<SQL

            DROP VIEW IF EXISTS `medicine_consumed_by_dept`;
            SQL;
    }
}
