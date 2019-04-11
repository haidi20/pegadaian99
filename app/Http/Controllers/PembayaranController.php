<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;

use Auth;
use Carbon\Carbon;

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
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function pembayaran()
    {
        $menu = 'pembayaran';

        // list column 'list biaya titip' and 'list biaya administrasi'
        $columnBiayaTitip           = config('library.column.pendapatan.list_biaya_titip');
        $columnBiayaAdministrasi    = config('library.column.pendapatan.list_biaya_administrasi');

    	return $this->template('pembayaran.pendapatan', compact(
            'menu', 'columnBiayaTitip', 'columnBiayaAdministrasi'
        ));
    }

    public function bku()
    {
        $menu   = 'bku';
        $column = config('library.column.bku');

    	return $this->template('pembayaran.bku', compact(
            'menu', 'column'
        ));
    }
}
