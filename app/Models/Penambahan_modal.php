<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penambahan_modal extends Model
{
    protected $table        = "penambahan_modal";
    public $timestamps      = false;
    protected $primaryKey   = 'id_penambahan_modal';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_penambahan_modal',
        'id_cabang',
    	'tanggal',
    	'jumlah',
    	'keterangan',
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
