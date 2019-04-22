<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table ='categories';
    
    public function article()
    {
    	return $this->hasMany('App\Models\Article','category_id');
    }
}
