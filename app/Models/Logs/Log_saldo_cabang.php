<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Log_saldo_cabang extends Model
{
    protected $table        = "log_saldo_cabang";
    public $timestamps      = false;
    protected $primaryKey   = 'id_log_kas';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_log_kas',
        'id_cabang',
        'jenis',
        'keterangan',
        'jumlah',
        'tanggal_log_saldo',
    ];
}
