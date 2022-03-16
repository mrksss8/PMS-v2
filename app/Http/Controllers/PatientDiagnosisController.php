<?php

namespace App\Http\Controllers;

use App\Models\PatientDiagnosis;
use Illuminate\Http\Request;

class PatientDiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PatientDiagnosis::create([
            'level_of_consciousness' => $request->level_of_consciousness,
            'breathing' => $request->breathing,
            'skin' => $request->skin,
            'diagnostic_test' => $request->diagnostic_test,
            'ICD_10_diagnosis' => $request->ICD_10_diagnosis,
            'assessment' => $request->assessment,
            'consultation_id' => $request->consultation_id,
            ]);

        return redirect()->route('doctor_intervention.show',$request->consultation_id);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientDiagnosis  $patientDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDiagnosis $patientDiagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientDiagnosis  $patientDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientDiagnosis $patientDiagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientDiagnosis  $patientDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientDiagnosis $patientDiagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientDiagnosis  $patientDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDiagnosis $patientDiagnosis)
    {
        //
    }
}
