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
    	// 'id_user_cabang',
    	'id_cabang',
    	'username',
    ];

    public function cabang()
    {
        return $this->hasOne('App\Models\Cabang', 'id_cabang', 'id_cabang');
    }

    // how to fetch data by username of user
    public function scopeBaseUsername($query)
    {
        return $query->where('username', Auth::user()->username);
    }

    public function getNomorCabangAttribute()
    {
        if($this->cabang){
            return $this->cabang->no_cabang;
        }
    }
}
