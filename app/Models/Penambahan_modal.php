<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User_cabang;

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

    // how to fetch data by username of user
    public function scopeIdCabang($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        return $query->where('id_cabang', $user_cabang->id_cabang);
    }

    public function scopeSearch($query, $by, $q)
    {
        return $query->where($by, 'LIKE', '%'.$q.'%');
    }

    public function scopeSorted($query, $by = 'tanggal', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }
}
