<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'first_name',
        'middle_name',
        'last_name',
        'affiliation',
        'gender',
        'initals',
        'is_admin',
        'role_id',
        'phone',
        'country',
        'image',
        'fax',
        'email',
        'password',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function comment()
    {
        return $this->hasMany('App\Models\Comment','user_id','id');
    }

    public function role()
    {
<<<<<<< HEAD
        return $this->belongsTo('App\Models\Role', 'role_id');
=======
        return $this->belongsTo('App\Models\Role', 'role_id','id');


>>>>>>> ce8bc8c52a777f221a38f6109bbcfea6b9a62960
    }

    public function article()
    {
        return $this->hasMany('App\Models\Article', 'user_id','id');

    }
}

