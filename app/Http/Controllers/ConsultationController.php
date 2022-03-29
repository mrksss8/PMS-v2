<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Complaint;
use App\Models\ReqLab;
use Carbon\Carbon;

class ConsultationController extends Controller
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
        if ($request->severe == 'severe'){

            $consultation = Consultation::create([
                //vitals-signs
                'severe' => $request->severe,
                'blood_pressure' => $request->blood_pressure,
                'temperature' => $request->temperature,
                'capillary_refill' => $request->capillary_refill,
                'weight' => $request->weight,
                'pulse_rate' => $request->pulse_rate,
                'respiratory_rate' => $request->respiratory_rate,
                
                //sign-and-symptoms
                'onset' => $request->onset,
                'provoke' => $request->provoke,
                'quality' => $request->quality,
                'severity' => $request->severity,
                'time' => $request->time,
                'allergies' => $request->allergies,
                'past_medication' => $request->past_medication,
                'last_meal' => $request->last_meal,
                'leading_up_to_emergency' => $request->leading_up_to_emergency,


                //patient foreign key
                'patient_id' => $request->patient_id,

            ]);
            
            //insert complaints
            $consultation_id = $consultation->id;
            $complaint = $request->complaints;
            
            for($i = 0; $i<count($complaint); $i++)
            {
                $complaints = [
                    [
                        'consultation_id' =>  $consultation_id,
                        'complaint' => $complaint[$i],
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                        ]
                    ];   
                    Complaint::insert($complaints);
            }

            //insert complaints
            $consultation_id = $consultation->id;
            $req_LabTest = $request->req_LabTest;

            for($i = 0; $i<count($req_LabTest); $i++)
            {
                $req_LabTests = [
                    [
                        'consultation_id' =>  $consultation_id,
                        'labtest' => $req_LabTest[$i],
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]
                ];   
                ReqLab::insert($req_LabTests);
            }

                return redirect()->route('dashboard.index');
        }


        else{
            $consultation = Consultation::create([
                'severe' => 'not-severe',
                'blood_pressure' => $request->blood_pressure,
                'temperature' => $request->temperature,
                'capillary_refill' => $request->capillary_refill,
                'weight' => $request->weight,
                'pulse_rate' => $request->pulse_rate,
                'respiratory_rate' => $request->respiratory_rate,

                //patient foreign key
                'patient_id' => $request->patient_id,
            ]);

            //insert complaints
            $consultation_id = $consultation->id;
            $complaint = $request->complaints;

            for($i = 0; $i<count($complaint); $i++)
            {
                $complaints = [
                    [
                        'consultation_id' =>  $consultation_id,
                        'complaint' => $complaint[$i],
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]
                ];   
                Complaint::insert($complaints);
            }

            return redirect()->route('nurse_intervention.show', $consultation->id);
        }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
