<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Log_edit_akad extends Model
{
    protected $table        = "log_edit_akad";
    protected $primaryKey   = 'id';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id',
        'no_id',
        'total_bea_titip',
        'tanggal_log',
    ];
}
