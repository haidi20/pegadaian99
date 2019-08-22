<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya_titip extends Model
{
    protected $table        = "bea_titip";
    public $timestamps      = false;
    protected $primaryKey   = 'id_bt';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_bt',
        'no_id',
        'uniq_key',
        'pembayaran',
        'pembayaran_ke',
        'tanggal_pembayaran',
        'keterangan',
    ];

    public function akad()
    {
        return $this->belongsTo('App\Models\Akad', 'no_id', 'no_id');
    }

    public function scopeSorted($query, $by = 'id_bt', $sort = 'asc')
    {
        return $query->orderBy($by, $sort);
    }

    public function getNominalPembayaranAttribute()
    {
        return $this->pembayaran;
    }
}
