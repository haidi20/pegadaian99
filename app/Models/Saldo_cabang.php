<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User_cabang;

class Saldo_cabang extends Model
{
    protected $table        = "saldo_cabang";
    public $timestamps      = false;
    protected $primaryKey   = 'id_saldo_cabang';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_saldo_cabang',
        'id_cabang',
        'total_saldo',
    ];

   // how to fetch data by username of user
    public function scopeIdCabang($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        return $query->where('id_cabang', $user_cabang->id_cabang);
    }
}
