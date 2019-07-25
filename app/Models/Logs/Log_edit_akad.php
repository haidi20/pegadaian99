<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Log_edit_akad extends Model
{
    protected $table        = "log_edit_akad";
    public $timestamps      = false;
    protected $primaryKey   = 'id_log_edit';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_log_edit',
        'no_id',
        'total_bea_titip',
        'tanggal_log',
    ];
}
