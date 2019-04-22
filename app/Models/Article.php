<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public function category()
    {
    	return $this->belongsTo('App\Models\Category','category_id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Models\Comment','article_id','id');
    }
}
