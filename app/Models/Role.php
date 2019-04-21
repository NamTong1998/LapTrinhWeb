<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $table ='user';
    public function user()
    {
    	return $this->hasOne('App\Models\User','user_id','id');
    }
   
}
