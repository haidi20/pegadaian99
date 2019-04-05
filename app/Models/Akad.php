<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akad extends Model
{
    protected $table        = "akad";
    public $timestamps      = false;
    protected $primaryKey   = 'id_akad';
    // protected $guarded   = [];
    protected $fillable     = [
        'id_cabang',
        'no_id',
        'key_nasabah',
        'nama_barang',
        'jenis_barang',
        'kelengkapan',
        'kekurangan',
        'jangka_waktu_akad',
        'tanggal_akad',
        'tanggal_jatuh_tempo',
        'nilai_tafsir',
        'nilai_pencairan',
        'bt_7_hari',
        'biaya_admin',
        'terbilang',
        'status',
    ];

    // for filter data between date variable start to variable $end
    public function scopeFilterRange($query, $start, $end)
    {
        return $query->whereBetween('tanggal_akad', [$start->format('Y-m-d'), $end->format('Y-m-d')]);
    }

    // for can fetch data nasabah use left join
    public function scopeNasabah($query)
    {
        return $query->leftJoin('nasabah', 'akad.key_nasabah', '=', 'nasabah.key_nasabah');
    }

    // search data by keyword form input
    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }

    public function scopeSorted($query, $by = 'id_akad', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function getNamaNasabahAttribute()
    {
    	if($this->nasabah){
    		return $this->nasabah->nama_lengkap;
    	}
    }
}
