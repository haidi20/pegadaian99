<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User_cabang;

class Hutang_cabang extends Model
{
    protected $table        = "hutang_cabang";
    public $timestamps      = false;
    protected $primaryKey   = 'id_hutang_cabang';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_hutang_cabang',
    	'id_hutang',
    	'id_piutang',
    	'tanggal_transaksi',
    	'jumlah',
    	'uraian_hutang',
    	'uraian_piutang',
    	'keterangan',
    	'status',
    ];

    // how to fetch data by username of user
    // public function scopeIdCabang($query)
    // {
    //     // get data id_cabang from table 'user_cabang' base on this user
    //     $user_cabang    = User_cabang::baseUsername()->first();

    //     return $query->where('id_cabang', $user_cabang->id_cabang);
    // }

    public function scopeSearch($query, $by, $q)
    {
        return $query->where($by, 'LIKE', '%'.$q.'%');
    }

    public function scopeSorted($query, $by = 'tanggal_transaksi', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function getNominalJumlahAttribute()
    {
        return nominal($this->jumlah_hutang);
    }
}
