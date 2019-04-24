<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Cabang;
use App\Models\User_cabang;
use App\Models\Saldo_cabang;

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
        // get data cabang from table 'user_cabang' base on this user
        $cabang         = Cabang::find($user_cabang->id_cabang);
        // and then get total 'kas cabang' base on id_cabang
        $saldo_cabang   = Saldo_cabang::whereId_cabang($user_cabang->id_cabang)->first();
        // 'total kas' base on cabang
        $total_kas      = nominal($saldo_cabang->total_saldo);
        $nomorCabang    = $cabang->no_cabang;

        return (object) compact('total_kas', 'nomorCabang');
    }


}
