<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\NurseIntervention;
use App\Models\DoctorIntervention;
use App\Models\Patient;
use App\Models\Consultation;
use Carbon\carbon;

class MonthlyreportController extends Controller
{
    public function index(){

        $date = Carbon::now();

        $monthly_complaints =  DB::table('complaints')
        ->select('complaint', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('complaint')
        ->orderByRaw('COUNT(*) DESC')
        ->whereNotNull('complaint')
        ->where('complaint' , '!=', 'severe')
        ->whereMonth('created_at',$date)
        ->get();

        $monthly_other_complaints =  DB::table('complaints')
        ->select('other', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('other')
        ->orderByRaw('COUNT(*) DESC')
        ->whereNull('complaint')
        ->whereMonth('created_at', $date)
        ->get();


        $illnesses =  DB::table('patient_diagnoses')
        ->select('ICD_10_diagnosis', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('ICD_10_diagnosis')
        ->orderByRaw('COUNT(*) DESC')
        ->whereMonth('created_at', $date)
        ->get();

        $nurse_intervention = NurseIntervention::count();
        $doctor_intervention = DoctorIntervention::count();


        //query for monthly consultation and monthly patient
        $consultation_cnt_of_patient = Patient::withCount([
           'consultations as cons_cnt' => function ($query){
               $query->whereMonth('created_at', Carbon::now());
           }
        ])->get();


        $department =  DB::table('doctor_interventions')
        ->select('med_qty', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('med_qty')
        ->orderByRaw('COUNT(*) DESC')
        ->whereMonth('created_at', $date)
        ->get();


        $medicine_consume_by_dept = DB::table('medicine_consume_by_dept')
        ->get();
        

        // $a = NurseIntervention::with('consultation')->get();
        // dd($a->consultation->patient->department);

        return view('report.monthly_report.index',compact('monthly_complaints','monthly_other_complaints',
        'illnesses','nurse_intervention','doctor_intervention','consultation_cnt_of_patient','medicine_consume_by_dept'));
    }
}
