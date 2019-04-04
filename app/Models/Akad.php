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

    public function scopeNasabah($query)
    {
        return $query->leftJoin('nasabah', 'akad.key_nasabah', '=', 'nasabah.key_nasabah');
    }

    public function scopeFilterRange($query, $start, $end)
    {
        return $query->whereBetween('tanggal_akad', [$start->format('Y-m-d'), $end->format('Y-m-d')]);
    }

    public function getNamaNasabahAttribute()
    {
    	if($this->nasabah){
    		return $this->nasabah->nama_lengkap;
    	}
    }
}
