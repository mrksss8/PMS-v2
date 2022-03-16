<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDiagnosis extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function consulatation()
    {
        return $this->belongsTo(Consulatation::class);
    }
}
