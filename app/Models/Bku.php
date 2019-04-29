<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Cabang;
use App\Models\User_cabang;

class Bku extends Model
{
    protected $table        = "bku";
    public $timestamps      = false;
    protected $primaryKey   = 'id_bku';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_bku',
        'jenis',
        'tanggal',
        'uraian',
        'debit',
        'kredit',
        'saldo',
        'id_cabang',
    ];

    // how to fetch data by username of user
    public function scopeIdCabang($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

    	return $query->where('id_cabang', $user_cabang->id_cabang);
    }

    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }

    public function scopeSorted($query, $by = 'tanggal', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function getNominalDebitAttribute()
    {
        return nominal(floatval($this->debit));
    }

    public function getNominalKreditAttribute()
    {
        return nominal(floatval($this->kredit));
    }

    public function getNominalSaldoAttribute()
    {
        return nominal(floatval($this->saldo));
    }
}
