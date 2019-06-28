<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User_cabang;

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

    // how to fetch data by username of user
    public function scopeBaseBranch($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        return $query->where('id_cabang', $user_cabang->id_cabang);
    }
}
