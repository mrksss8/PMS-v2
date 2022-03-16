<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
    'first_name',
    'last_name',
    'middle_name',
    'birthday',
    'gender',
    'department_id',
        ];

    protected $dates = [
        'birthday',
    ];
    
    public function getBirthdayAttribute($date)
    {
       return Carbon::createFromFormat('Y-m-d', $date)->format('F d, Y');
    }
 
    public function age(){
        return Carbon::parse($this->attributes['birthday'])->age;
    }
    

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    //Relationship
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function medical_records()
    {
       return $this->hasMany(medical_history::class);
    }

    public function consultations()
    {
       return $this->hasMany(Consultation::class);
    }

    

}
