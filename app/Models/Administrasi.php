<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    protected $table 		= 'administrasi';
    public $timestamps      = false;
    protected $primaryKey	= 'id_adm';
    protected $fillable 	= [
    	'id_adm',
    	'no_id',
    	'tanggal_transaksi',
    	'jumlah',
    	'keterangan',
    ];

    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }
}
