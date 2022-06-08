<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\medical_history;
use Carbon\Carbon;
use App\Models\User;
use Auth;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $patients = Patient::with('department','medical_records')->orderBy('id', 'DESC')->get();
        return view('patient_management.patient_list.index',compact('patients'));
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
    public function store(PatientRequest $request)
    {        
         $patient = Patient::create([
            'first_name' => $request->last_name,
            'last_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,

            //depart foreign key
            'department_id' => $request->department_id,
        ]);

            //insert medical record
            $patient_id = $patient->id;
            $medical_record = $request->medical_record;

            for($i = 0; $i<count($medical_record); $i++)
            {
                $medical_records = [
                    [
                        'patient_id' =>  $patient_id,
                        'medical_record' => $medical_record[$i],
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]
                ];   
                medical_history::insert($medical_records);
            }

        return redirect()->route('patients.index')->with('success','Patient Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $doctors = User::whereHas('user_roles.roles', function ($query) {
            return $query->where('name', '=', 'Doctor'); 
        })->get();

        $patient = Patient::with('department','medical_records','consultations')->findorfail($id);

        return view('patient_management.patient_list.show',compact('patient','doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
