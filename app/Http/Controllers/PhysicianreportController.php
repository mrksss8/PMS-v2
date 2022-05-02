<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class PhysicianreportController extends Controller
{
    public function index(){

        $c = Consultation::with('patient.department','doctor_intervention', 'patient_diagnosis')->get();
        
        return view('report.physician_report.index',compact('c'));

    }

    public function search(Request $request){


        $c = Consultation::with('patient.department','doctor_intervention', 'patient_diagnosis')->where('created_at', '>=', $request->search_from)->where('created_at', '<=', $request->search_to)->get();
        
        return view('report.physician_report.index',compact('c'));
    }

}
