<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Login extends Model
{
    protected $table        = "login";
    public $timestamps      = false;
    protected $primaryKey   = 'id_login';
    // protected $guarded   = [];
    protected $fillable     = [
        'id_login',
        'username_login',
        'sesi_login',
        'waktu_login',
        'waktu_logout',
        'ip_addr',
        'status'
    ];

    public function scopeSearch($query, $by, $q)
    {
        return $query->where($by, 'LIKE', '%'.$q.'%');
    }

    public function scopeSorted($query, $by = 'waktu_login', $sort = 'desc')
    {
        return $query->orderBy($by, $sort);
    }

    public function getShowLogOutAttribute()
    {
        $logOut = Carbon::parse($this->waktu_logout);

        if($logOut->format('Y') == '2000'){
            return '0000-00-00 00:00:00';
        }else{
            return $this->waktu_logout;
        }
    }
}
