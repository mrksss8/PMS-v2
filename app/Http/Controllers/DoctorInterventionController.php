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

        $for_interventions = Consultation::with('patient')->where('severe','=', 'severe')->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorIntervention  $doctorIntervention
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorIntervention $doctorIntervention)
    {
        //
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
