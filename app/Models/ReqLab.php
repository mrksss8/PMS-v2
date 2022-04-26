<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqLab extends Model
{
    use HasFactory;

    protected $fillable = ['lab_test','filename','path','consultation_id'];
}
