<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table        = "setting";
    // protected $guarded   = [];
    protected $fillable     = [
        'id',
        'potongan',
        'margin_kendaraan',
        'margin_elektronik'
    ];

    // how to fetch data by username of user
    public function scopebaseBranch($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        return $query->where('id_cabang', $user_cabang->id_cabang);
    }

    public function getNominalPotonganAttribute()
    {
        return 'Rp '. nominal($this->potongan);
    }
}
