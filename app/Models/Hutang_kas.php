<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hutang_kas extends Model
{
    protected $table        = "hutang_kas";
    public $timestamps      = false;
    protected $primaryKey   = 'id_hutang_kas';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_hutang_kas',
        'id_cabang',
        'jumlah',
        'uraian',
    	'tanggal_hutang',
    	'status_hutang',
    ];

    public function scopeBaseBranch($query, $id)
    {
        return $query->where('id_cabang', $id);
    }

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

    public function scopeSorted($query, $by = 'tanggal_hutang', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function scopeStatus($query, $condition)
    {
        return $query->where('status_hutang', $condition);
    }

    public function getNominalJumlahAttribute()
    {
        return nominal($this->jumlah);
    }
}
