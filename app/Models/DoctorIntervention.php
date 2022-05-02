<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consulatation;

class DoctorIntervention extends Model
{

    protected $guarded = [];
    use HasFactory;

    public function consultation(){

        return $this->belongsTo(Consultation::class);
    }
}
