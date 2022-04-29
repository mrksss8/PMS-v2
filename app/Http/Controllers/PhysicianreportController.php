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

}
