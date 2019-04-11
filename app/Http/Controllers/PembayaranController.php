<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;

use Carbon\Carbon;
use Auth;

class PembayaranController extends Controller
{
	public function __construct(
                                Cabang $cabang,
    							Request $request,
    							Kas_cabang $kas_cabang,
    							User_cabang $user_cabang
                            )
    {
        $this->cabang       = $cabang;
    	$this->request  	= $request;
    	$this->kas_cabang   = $kas_cabang;
    	$this->user_cabang 	= $user_cabang;

        view()->share([
            'menu'          => 'akad',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function pembayaran()
    {
    	return $this->template('pembayaran.pendapatan', array());
    }

    public function bku()
    {
    	
    }
}
