<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine_consumption extends Model
{
    use HasFactory;
    protected $fillable = ['consume','medicine_id'];


    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
