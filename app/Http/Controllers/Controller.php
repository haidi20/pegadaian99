<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function template($file, $variable)
    {
    	$infoCabang = $this->infoCabang();
    	$variable['infoCabang'] = (object) $infoCabang;

    	return view($file, (array) $variable);
    }

    // FYI important => auth::user()->username not working in __construct()
    public function infoCabang()
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();
        if($user_cabang){
            // get data cabang from table 'user_cabang' base on this user
            $cabang         = Cabang::find($user_cabang->id_cabang);
            $nomorCabang    = $cabang ? $cabang->no_cabang : 0;
            // and then get total 'kas cabang' base on id_cabang
            $saldo_cabang   = Kas_cabang::idCabang()->first();
            $total_kas      = $saldo_cabang ? $saldo_cabang->total_kas : 0; 
            // 'total kas' base on cabang
            $total_kas      = nominal($total_kas);     
        }else{
            $total_kas      = 'Tidak Ditemukan';
            $nomorCabang    = 'Tidak Ditemukan';
        }

        return (object) compact('total_kas', 'nomorCabang');
    }

    // get data id_cabang from table 'user_cabang' base on this user
    public function id_cabang()
    {
        return User_cabang::baseUsername()->value('id_cabang');
    }


}
