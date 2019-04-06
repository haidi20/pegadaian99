<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
        // get data cabang from table 'user_cabang' base on this user
        $user_cabang    = $this->user_cabang->baseUsername()->first();
        // and then get total 'kas cabang' base on id_cabang
        $kas_cabang     = $this->kas_cabang->whereId_cabang($user_cabang->id_cabang)->first();
        // 'total kas' base on cabang
        $total_kas      = number_format($kas_cabang->total_kas, 2);

        return (object) compact('total_kas');
    }


}
