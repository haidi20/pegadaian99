<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bku;
use App\Models\Administrasi;

use Auth;
use Carbon\Carbon;

class PembayaranController extends Controller
{
	public function __construct(
    							Bku $bku,
                                Request $request,
                                Administrasi $administrasi
                            )
    {
    	$this->bku  	    = $bku;
        $this->request      = $request;
        $this->administrasi = $administrasi;

        view()->share([
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function pembayaran()
    {
        $menu = 'pembayaran';

        $administrasi = $this->administrasi();

        // list column 'list biaya titip' and 'list biaya administrasi'
        $columnBiayaTitip           = config('library.column.pendapatan.list_biaya_titip');
        $columnBiayaAdministrasi    = config('library.column.pendapatan.list_biaya_administrasi');

    	return $this->template('pembayaran.pendapatan', compact(
            'menu', 'columnBiayaTitip', 'columnBiayaAdministrasi',
            'administrasi'
        ));
    }

    // for table 'LIST BIAYA ADMINISTRASI'
    public function administrasi()
    {
        $administrasi = $this->administrasi;

        if(request('by_adm')){
            $administrasi = $administrasi->search(request('by_adm'), request('q_adm'));
        }

        $administrasi = $administrasi->paginate(request('perpage_adm', 10));

        return $administrasi;
    }

    public function bku()
    {
        $menu   = 'bku';

        $bku = $this->bku->idCabang();

        if(request('by')){
            $bku = $bku->search(request('by'), request('q'));
        }

        $bku = $bku->paginate(request('perpage', 10));

        $column = config('library.column.bku');

    	return $this->template('pembayaran.bku', compact(
            'menu', 'column', 'bku'
        ));
    }
}
