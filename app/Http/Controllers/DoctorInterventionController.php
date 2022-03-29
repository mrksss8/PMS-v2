<?php

namespace App\Http\Controllers;

use App\Models\DoctorIntervention;
use Illuminate\Http\Request;
use App\Models\Consultation;

class DoctorInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $for_interventions = Consultation::with('patient','doctor_intervention')->where('severe','=', 'severe')->get();
        return view('intervention.doctor_intervention.index',compact('for_interventions'));
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
        DoctorIntervention::create([
            'medicine' => $request->medicine,
            'med_qty' => $request->med_qty,
            'supply' => $request->supply,
            'supply_qty' => $request->suppply_qty,
            'action' => $request->action,
            'clinic_rest_num_of_mins' => $request->clinic_rest_num_of_mins,
            'clinic_rest_approve_by' => $request->clinic_rest_approve_by,
            'sent_to_home_approve_by' => $request->sent_to_home_approve_by,
            'sent_to_emer_approve_by' => $request->sent_to_emer_approve_by,
            'sent_to_emer_refusal' => $request->sent_to_emer_refusal,
            'sent_to_emer_refuse_witness' => $request->sent_to_emer_refuse_witness,
            'sent_to_emer_refuse_waiver' => $request->sent_to_emer_refuse_waiver,
            'other_intervention_info' => $request->other_intervention_info,
            'consultation_id' => $request->consultation_id
            ]);

            return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorIntervention  $doctorIntervention
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($consultation);
        $consultation = Consultation::with('patient','complaints','patient_diagnosis','lab_tests')->findorfail($id);
        return view('intervention.doctor_intervention.show',compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorIntervention  $doctorIntervention
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorIntervention $doctorIntervention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorIntervention  $doctorIntervention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorIntervention $doctorIntervention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorIntervention  $doctorIntervention
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorIntervention $doctorIntervention)
    {
        //
    }
}
