<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseIntervention extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "nurse_interventions";


    public function consultation(){

        return $this->belongsTo(Consultation::class);
    }
}
