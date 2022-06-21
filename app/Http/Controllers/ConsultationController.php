<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Complaint;
use App\Models\ReqLab;
use Carbon\Carbon;
use App\Http\Requests\ConsultationRequest;
use App\Http\Requests\ConsultationSevereRequest;

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
    public function store(ConsultationRequest $request, ConsultationSevereRequest $request_severe)
    {   

        if (in_array("severe", $request_severe->complaints)) {

            $consultation = Consultation::create([

                //vitals-signs
                'severe' => 'severe',
                'blood_pressure' => $request_severe->blood_pressure,
                'temperature' => $request_severe->temperature,
                'capillary_refill' => $request_severe->capillary_refill,
                'weight' => $request_severe->weight,
                'pulse_rate' => $request_severe->pulse_rate,
                'respiratory_rate' => $request_severe->respiratory_rate,
                
                //sign-and-symptoms
                'onset' => $request_severe->onset,
                'location' => $request_severe->location,
                'duration' => $request_severe->duration,
                'character' => $request_severe->character,
                'aggravating_factor' => $request_severe->aggravating_factor,
                'radiation' => $request_severe->radiation,
                'time' => $request_severe->time,
                'severity' => $request_severe->severity,


                'doctor' => $request_severe->doctor_to_intervent,

                //patient foreign key
                'patient_id' => $request_severe->patient_id,

            ]);
            
            //insert complaints
            $consultation_id = $consultation->id;
            $complaint = $request_severe->complaints;
            
           

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
            
            //insert other complaints
            Complaint::create([

                'consultation_id' => $consultation_id,
                'other' => $request->other,

            ]);

            //insert labtest
            $consultation_id = $consultation->id;
            $req_LabTest = $request_severe->req_LabTest;
  

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

                return redirect()->route('dashboard.index')->with('success','Conslutation Added Successfully!');;
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
            
                 //insert other complaints
            Complaint::create([

                'consultation_id' => $consultation_id,
                'other' => $request->other,

            ]);

            return redirect()->route('nurse_intervention.show', $consultation->id)->with('success','Conslutation Added Successfully!');
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
