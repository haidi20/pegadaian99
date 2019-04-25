<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $table        = "refund";
    public $timestamps      = false;
    protected $primaryKey   = 'id_refund';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_refund',
        'id_cabang',
    	'tanggal',
    	'jumlah',
    	'uraian',
    ];

    public function scopeSearch($query, $by, $q)
    {
        return $query->where($by, 'LIKE', '%'.$q.'%');
    }

    // how to fetch data by username of user
    public function scopeIdCabang($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        return $query->where('id_cabang', $user_cabang->id_cabang);
    }
}
