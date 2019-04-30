<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table        = "setting";
    // protected $guarded   = [];
    protected $fillable     = [
    	'id',
        'persenan',
        'biaya_titip',
    ];
}
