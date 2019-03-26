<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class User_cabang extends Model
{
    protected $table 		= 'user_cabang';
    protected $primaryKey	= 'id_user_cabang';
    protected $fillable 	= [
    	'id_user_cabang',
    	'id_cabang',
    	'username',
    ];

    // how to fetch data base username of user
    public function scopeFetchData($query)
    {
    	$query->whereUsername(Auth::user()->username);

    	return $query;
    }
}
