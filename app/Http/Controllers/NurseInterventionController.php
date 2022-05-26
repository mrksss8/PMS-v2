<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\NurseIntervention;
use App\Models\Medicine;
use App\Models\medicine_consumption;
use App\Models\Supply;
use App\Http\Requests\NurseInterventionRequest;


class NurseInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(NurseInterventionRequest $request)
    {

        if($request->medicine != null){     
            $med = Medicine::findorfail($request->medicine);

            if ($med->beginning_stock >= $request->med_qty){

                $new_stock =  $med->beginning_stock - $request->med_qty;
                $med->beginning_stock = $new_stock;
                $med->save();
                
                medicine_consumption::create([
                    'consume' => $request->med_qty,
                    'medicine_id' => $med->id,
                ]);
            
                NurseIntervention::create([
                    'medicine' => $med->brand_name.' '. $med->dosage,
                    'med_qty' => $request->med_qty,
                    // 'supply' => $request->supply,
                    // 'supply_qty' => $request->supply_qty,
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
             
                return redirect()->route('dashboard.index')->with('success','Intervention Added Successfully!');  

            }
            else{
                return redirect()->route('dashboard.index')->with('success','Medicine exceed from Stock!');  
            }
        }


            

        if($request->supply != null){   

            $sup = Supply::findorfail($request->supply);

            if ($sup->beginning_stock >= $request->supply_qty){

                $new_stock =  $sup->beginning_stock - $request->supply_qty;
                $sup->beginning_stock = $new_stock;
                $sup->save();
                
                NurseIntervention::create([
                    // 'medicine' => $med->brand_name.' '. $med->dosage,
                    // 'med_qty' => $request->med_qty,
                     'supply' => $sup->supply,
                     'supply_qty' => $request->supply_qty,
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
             
                return redirect()->route('dashboard.index')->with('success','Intervention Added Successfully!');  

            }
            else{
                return redirect()->route('dashboard.index')->with('success','Supply exceed from Stock!');  
            }
        }


        NurseIntervention::create([
            // 'medicine' => $med->brand_name.' '. $med->dosage,
            // 'med_qty' => $request->med_qty,
            //  'supply' => $sup->supply,
            //  'supply_qty' => $request->supply_qty,
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
     
            

            return redirect()->route('patients.show',$request->patient_id)->with('success','Intervention Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $medicines = Medicine::all();
        $supplies = Supply::all();

        $consultation = Consultation::with('patient','complaints')->findorfail($id);
        return view('intervention.nurse_intervention.show',compact('consultation','medicines','supplies'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
