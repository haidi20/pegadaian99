<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Log_akad_ulang extends Model
{
    protected $table        = "log_akad_ulang";
    // public $timestamps      = false;
    protected $primaryKey   = 'id';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id',
        'no_id',
        'debit',
        'kredit',
        'saldo',
        'created_at',
        'updated_at'
    ];
}
