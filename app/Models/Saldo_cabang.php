<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function scopeIdCabang($query, $value)
    {
    	return $query->where('id_cabang', $value);
    }
}
