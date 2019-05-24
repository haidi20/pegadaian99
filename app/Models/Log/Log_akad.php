<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;

class Log_akad extends Model
{
    protected $table        = "log_akad";
    public $timestamps      = false;
    protected $primaryKey   = 'id_log_akad';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_log_akad',
        'no_id',
        'tanggal_log',
        'status',
    ];
}
