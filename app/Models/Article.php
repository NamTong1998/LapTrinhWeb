<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public function user()
    {
    	return $this->belongsTo('App\Models\Caterory','categories_id','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Models\Comment','article_id','id');
    }
}
