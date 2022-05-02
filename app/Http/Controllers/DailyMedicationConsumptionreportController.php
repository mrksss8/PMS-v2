<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorIntervention;
use App\Models\Patient;
use App\Models\Department;
use DB;

class DailyMedicationConsumptionreportController extends Controller
{
    public function index(){

        $consume_meds = DoctorIntervention::with('consultation.patient')->get();

        $consume_meds_by_dept = DoctorIntervention::whereHas('consultation.patient.department', function ($query) {
          return $query->distinct();
        })->get();
        

        $medicine_consume_by_dept = DB::table('medicine_consumed_by_dept')
        ->get();
    
        return view('report.daily_medication_consumption.index',compact('consume_meds','medicine_consume_by_dept'));
    }
}
