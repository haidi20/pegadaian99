<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Cabang extends Model
{
    protected $table        = "cabang";
    public $timestamps      = false;
    protected $primaryKey   = 'id_cabang';
    // protected $guarded   = [];
    protected $fillable     = [
        'id_cabang',
        'no_cabang',
        'investor',
        'nama_cabang',
        'telp_cabang',
        'alamat_cabang',
    ];

    protected static function boot()
    {
        // parent::boot();
        // static::creating(function ($model) {
        //     try {
        //         $model->id_cabang = Uuid::uuid4()->toString();
        //     } catch (UnsatisfiedDependencyException $e) {
        //         abort(500, $e->getMessage());
        //     }
        // });
    }

    public function getIncrementing()
    {
        // return false;
    }

    public function getKeyType()
    {
        // return 'string';
    }

    public function scopeFilterRange($query, $start, $end)
    {
        return $query->whereBetween('tanggal_akad', [$start->format('Y-m-d'), $end->format('Y-m-d')]);
    }

    public function scopeKasCabang($query)
    {
        return $query->leftJoin('kas_cabang', 'cabang.id_cabang', '=', 'kas_cabang.id_cabang');
    }

    public function scopeSearch($query, $q)
    {
        return $query->where('nama_cabang', 'LIKE', '%'.$q.'%');
    }

    public function scopeSorted($query, $by = 'cabang.id_cabang', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function scopeShortedNoCabang($query)
    {
        return $query->orderBy('no_cabang', 'asc');
    }

    public function getTampilkanTotalKasAttribute()
    {
        $total_kas = $this->total_kas ? $this->total_kas : 0;

        return number_format($total_kas, 2);
    }


}
