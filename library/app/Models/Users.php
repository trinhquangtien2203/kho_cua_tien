<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table='vp_users';
    protected $primaryKey='id';
    protected $guared=['password'];
    
}
