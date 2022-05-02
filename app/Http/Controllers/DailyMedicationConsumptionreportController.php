<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorIntervention;
use App\Models\Patient;
use App\Models\Department;

class DailyMedicationConsumptionreportController extends Controller
{
    public function index(){

        $consume_meds = DoctorIntervention::with('consultation.patient')->get();

        $consume_meds_by_dept = DoctorIntervention::whereHas('consultation.patient.department', function ($query) {
          return $query->distinct();
        })->get();
        
        dd($consume_meds_by_dept);
    
        return view('report.daily_medication_consumption.index',compact('consume_meds'));
    }
}
