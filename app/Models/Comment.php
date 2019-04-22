<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ='comments';
    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id','id');
    }	
    public function article()
    {
    	return $this->belongsTo('App\Models\Article','article_id','id');
    }
}
