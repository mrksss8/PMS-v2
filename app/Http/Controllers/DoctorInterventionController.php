<?php

namespace App\Http\Controllers;

use App\Models\DoctorIntervention;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Medicine;
use App\Models\medicine_consumption;
use App\Models\Supply;
use App\Models\User;
use Auth;
use App\Http\Requests\DoctorInterventionRequest;

class DoctorInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $users = User::with('user_roles.roles')->get();
        
        //  $doctor = User::whereHas('user_roles.roles', function ($query) {
            //     return $query->where('name', '=', 'Doctor'); 
            // })->get();
            
        $userDoctorId = Auth::user()->id;
        
        $for_interventions = Consultation::with('patient','doctor_intervention')->where('severe','=', 'severe')->where('doctor',$userDoctorId)->get();
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
    public function store(DoctorInterventionRequest $request)
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
            
                DoctorIntervention::create([
                 'medicine' => $med->brand_name.' '. $med->dosage,
                 'med_qty' => $request->med_qty,
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
             
                return redirect()->route('dashboard.index')->with('success','Intervention Added Successfully!');  

            }
            else{
                return redirect()->route('doctor_intervention.show',$request->consultation_id)->with('success','Medicine exceed from Stock!');  
            }
        }





        if($request->supply != null){   

            $sup = Supply::findorfail($request->supply);

            if ($sup->beginning_stock >= $request->supply_qty){

                $new_stock =  $sup->beginning_stock - $request->supply_qty;
                $sup->beginning_stock = $new_stock;
                $sup->save();
                
                DoctorIntervention::create([
                //  'medicine' => $med->brand_name,
                //  'med_qty' => $request->med_qty,
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
                return redirect()->route('doctor_intervention.show',$request->consultation_id)->with('success','Supply exceed from Stock!');  
            }
        }

        DoctorIntervention::create([
            //  'medicine' => $med->brand_name,
            //  'med_qty' => $request->med_qty,
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
         
            return redirect()->route('dashboard.index')->with('success','Intervention Added Successfully!');  




        // if($request->supply != null){      

        // $sup = Supply::findorfail($request->supply);
        // $new_stock =  $sup->beginning_stock - $request->supply_qty;
        // $sup->beginning_stock = $new_stock;
        // $sup->save();

        // DoctorIntervention::create([
        //     'medicine' => $med->brand_name,
        //     'med_qty' => $request->med_qty,
        //     'supply' => $sup->supply,
        //     'supply_qty' => $request->supply_qty,
        //     'action' => $request->action,
        //     'clinic_rest_num_of_mins' => $request->clinic_rest_num_of_mins,
        //     'clinic_rest_approve_by' => $request->clinic_rest_approve_by,
        //     'sent_to_home_approve_by' => $request->sent_to_home_approve_by,
        //     'sent_to_emer_approve_by' => $request->sent_to_emer_approve_by,
        //     'sent_to_emer_refusal' => $request->sent_to_emer_refusal,
        //     'sent_to_emer_refuse_witness' => $request->sent_to_emer_refuse_witness,
        //     'sent_to_emer_refuse_waiver' => $request->sent_to_emer_refuse_waiver,
        //     'other_intervention_info' => $request->other_intervention_info,
        //     'consultation_id' => $request->consultation_id
        //     ]);
   
        //    return redirect()->route('dashboard.index')->with('success','Intervention Added Successfully!');   

        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorIntervention  $doctorIntervention
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicines = Medicine::all();
        $supplies = Supply::all();
        // dd($consultation);
        $consultation = Consultation::with('patient','complaints','patient_diagnosis','lab_tests')->findorfail($id);
        return view('intervention.doctor_intervention.show',compact('consultation','medicines','supplies'));
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
