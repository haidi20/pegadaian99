<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table        = "nasabah";
    public $timestamps      = false;
    protected $primaryKey   = 'id_nasabah';
    // protected $guarded   = [];
    protected $fillable     = [
        'id_nasabah',
        'key_nasabah',
        'nama_lengkap',
        'jenis_kelamin',
        'kota',
        'no_telp',
        'jenis_id',
        'no_identitas',
        'tanggal_lahir',
        'tanggal_daftar',
        'alamat',
    ];

    public function scopeSearch($query, $by, $q)
    {
        return $query->where($by, 'LIKE', '%'.$q.'%');
    }

    public function scopeSorted($query, $by = 'nasabah.id_nasabah', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }
}
