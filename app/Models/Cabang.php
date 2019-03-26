<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Cabang extends Model
{
    protected $table = "cabang";
    protected $primaryKey = 'id_cabang';
    protected $guarded = [];
    protected $fillable = [
        'id_cabang',
        'no_cabang',
        'investor',
        'nama_cabang',
        'telp_cabang',
        'alamat_cabang',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->id_cabang = Uuid::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function scopeShortedNoCabang($query)
    {
        $query->orderBy('no_cabang', 'asc');

        return $query;
    }


}
