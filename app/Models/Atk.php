<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atk extends Model
{
    protected $table        = "atk";
    public $timestamps      = false;
    protected $primaryKey   = 'id_atk';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_atk',
        'id_cabang',
    	'tanggal_atk',
    	'jumlah_atk',
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

    public function scopeSorted($query, $by = 'tanggal_atk', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function getNominalJumlahAttribute()
    {
        return nominal($this->jumlah_atk);
    }
}
