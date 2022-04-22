<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Consultation extends Model
{
    use HasFactory;

    protected $fillable = ['department','blood_pressure','temperature','respiratory_rate','capillary_refill','weight','pulse_rate','patient_id',
                            'onset','provoke','quality','severity','time','allergies','past_medication','last_meal','leading_up_to_emergency',
                            'severe'];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function complaints()
    {
       return $this->hasMany(Complaint::class);
    }

    public function lab_tests()
    {
       return $this->hasMany(ReqLab::class);
    }

    public function getComplaints($id){

        $complaints = DB::table('complaints')
        ->select('complaint','created_at')
        ->where('consultation_id', '=', $id)
        ->get();

        return $complaints;  
    }

    public function patient_diagnosis()
    {
       return $this->hasMany(PatientDiagnosis::class);
    }

    public function doctor_intervention(){

        return $this->hasOne(DoctorIntervention::class);
    }

    public function nurse_intervention(){

        return $this->hasOne(NurseIntervention::class);
    }

    // public function consultation_cnt(){

    //     $consultation_cnt = DB::table('consultations')->count();

    //     return $consultation_cnt;  
    // }

}
