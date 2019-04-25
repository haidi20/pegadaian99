<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User_cabang;

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

    public function getNominalJumlahAttribute()
    {
        return nominal($this->jumlah);
    }
}
