<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User_cabang;

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

    public function akad()
    {
        return $this->hasOne('App\Models\Akad', 'key_nasabah');
    }

    // public function scopeBaseBranch($query)
    // {
    //     // get data id_cabang from table 'user_cabang' base on this user
    //     $user_cabang    = User_cabang::baseUsername()->first();

    //     $query = $query->whereHas('akad', function($akad) use ($user_cabang){
    //         $akad->where('id_cabang', $user_cabang->id_cabang);
    //     });

    //     return $query;
    // }

    public function scopeSearch($query, $by, $q)
    {
        return $query->where($by, 'LIKE', '%'.$q.'%');
    }

    public function scopeSorted($query, $by = 'nasabah.id_nasabah', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }
}
