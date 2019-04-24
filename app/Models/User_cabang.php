<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Cabang;
use App\Models\User_cabang;

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

    // how to fetch data by username of user
    public function scopeBaseUsername($query)
    {
        return $query->where('username', Auth::user()->username);
    }
}
