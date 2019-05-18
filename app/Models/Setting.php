<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table        = "setting";
    // protected $guarded   = [];
    protected $fillable     = [
        'id',
        'id_cabang',
        'jenis_barang',
        'potongan',
        'margin',
    ];

    public function cabang()
    {
        return $this->hasOne('App\Models\Cabang', 'id_cabang', 'id_cabang');
    }

    // how to fetch data by username of user
    public function scopeBaseBranch($query)
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        $validasi = $this->where('id_cabang', $user_cabang->id_cabang)->first();

        if($validasi){
            return $query->where('id_cabang', $user_cabang->id_cabang);
        }else{
            return $query->where('id_cabang', 0);
        }
    }

    public function scopeJenisBarang($query, $itemType = null)
    {
        return $query->where('jenis_barang', $itemType);
    }

    public function getNominalPotonganAttribute()
    {
        return 'Rp '. nominal($this->potongan);
    }

    public function getNomorCabangAttribute()
    {
        if($this->cabang){
            return $this->cabang->no_cabang;
        }else{
            return 'Semua';
        }
    }
}
