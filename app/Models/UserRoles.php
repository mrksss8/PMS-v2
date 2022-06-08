<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory;

    protected $table = "model_has_roles";/* A relationship between the UserRoles model and the User
    model. */
    

    public function roles()
    {
       return $this->belongsTo(Roles::class,'role_id');
    }
}
