<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kas_cabang extends Model
{
    protected $table        = "kas_cabang";
    public $timestamps      = false;
    protected $primaryKey   = 'id_kas';
    // protected $guarded   = [];
    protected $fillable     = [
    	'id_kas',
        'id_cabang',
        'total_kas',
    ];
}
