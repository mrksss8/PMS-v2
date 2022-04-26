<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class NurseAssestmentreportController extends Controller
{
    public function index(){

        $c = Consultation::with('complaints','patient.department', 'patient_diagnosis', 'nurse_intervention')->get();
        return view('report.nurse_assestment.index',compact('c'));
    }
}
