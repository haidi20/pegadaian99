<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class User_cabang extends Model
{
    protected $table 		= 'user_cabang';
    public $timestamps      = false;
    protected $primaryKey	= 'id_user_cabang';
    protected $fillable 	= [
    	'id_user_cabang',
    	'id_cabang',
    	'username',
    ];

    public function cabang()
    {
        return $this->belongsTo('App\Models\Cabang');
    }

    // how to fetch data by username of user
    public function scopeBaseUsername($query)
    {
    	$query->whereUsername(Auth::user()->username);

    	return $query;
    }
}
