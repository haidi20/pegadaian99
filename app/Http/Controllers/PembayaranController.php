<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Models\Bku;
use App\Models\Akad;
use App\Models\Biaya_titip;
use App\Models\Administrasi;

use Auth;
use Carbon\Carbon;

class PembayaranController extends Controller
{
	public function __construct(
    							Bku $bku,
    							Akad $akad,
                                Request $request,
    							Biaya_titip $biaya_titip,
                                Administrasi $administrasi
                            )
    {
        $this->bku  	    = $bku;
    	$this->akad  	    = $akad;
        $this->request      = $request;
        $this->biaya_titip  = $biaya_titip;
        $this->administrasi = $administrasi;

        view()->share([
            'menu'          => 'pembayaran',
            'subMenu'       => '',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function pendapatan()
    {
        $biayaTitip         = $this->biaya_titip();
        $administrasi       = $this->administrasi();

        // return $biayaTitip->dateRange;

        // list column 'list biaya titip' and 'list biaya administrasi'
        $columnBiayaTitip           = config('library.column.pendapatan.list_biaya_titip');
        $columnBiayaAdministrasi    = config('library.column.pendapatan.list_biaya_administrasi');

    	return $this->template('pembayaran.pendapatan', compact(
            'columnBiayaTitip', 'columnBiayaAdministrasi', 
            'administrasi', 'biayaTitip'
        ));
    }

    // for table 'LIST BIAYA TITIP'
    public function biaya_titip()
    {
        $akad = $this->akad->baseBranch()->joinNasabah()->joinBiayaTitip();

        // $akad = $akad->where('status_pendapatan', 1);
        $akad = $akad->sorted('tanggal_pembayaran', 'desc');
        $akad = $akad->sorted('akad.no_id', 'desc');
        $akad = $akad->groupBy('akad.no_id');
        $akad = $akad->selectRaw('sum(pembayaran) as total_pembayaran, pembayaran, nama_lengkap, tanggal_akad, kredit, saldo, akad.no_id');

        if(request('daterange')){
            $endDate    = carbon::parse(substr(request('daterange'), 13, 20));
            $startDate  = carbon::parse(substr(request('daterange'), 1, 9));
        }else{
            $endDate    = Carbon::now();
            $startDate  = Carbon::now()->subMonths(3)->startOfMonth();
        }

        $akad = $akad->whereBetween('tanggal_akad', [$startDate, $endDate]);

        if(request('by')){
            $akad = $akad->where(request('by'), 'LIKE', '%'.request('q').'%');
        }
        
        $data       = $akad->get();
        $total      = $this->total_pembayaran();
        $dateRange  = $startDate->format('m/d/Y').' - '.$endDate->format('m/d/Y');

        return (object) compact('total', 'data', 'dateRange');
    }

    public function total_pembayaran()
    {
        $total  = $this->akad->baseBranch()->joinBiayaTitip();
        $total  = $total->sorted('tanggal_pembayaran', 'desc')->sorted('akad.no_id', 'desc');
        $total  = $total->first()->saldo;

        return nominal($total);
    }

    // for table 'LIST BIAYA ADMINISTRASI'
    public function administrasi()
    {
        $akad = $this->akad->joinNasabah()->baseBranch();
        $akad = $akad->sorted('tanggal_akad', 'desc');
        $akad = $akad->paginate(10);

        return $akad;
    }

    public function cair_pendapatan()
    {
        $total      = remove_dot(request('total'));
        $nominal    = remove_dot(request('nominal'));
        $keterangan = remove_dot(request('keterangan'));

        $hasil_total = $total - $nominal;

        $nowYear    = Carbon::now()->format('Y');
        $nowMonth   = Carbon::now()->format('m');

        $no_id      = 'c99-'.$this->infoCabang()->nomorCabang.'-'.Carbon::now()->format('dmy');

        $biaya_titip = $this->biaya_titip;
        $biaya_titip = $biaya_titip->whereMonth('tanggal_pembayaran', $nowMonth);
        $biaya_titip = $biaya_titip->whereYear('tanggal_pembayaran', $nowYear);
        
        $biaya_titip->update([
            'status_pendapatan' => 1
        ]);

        $data_bt = $this->biaya_titip;
        $data_bt->no_id                 = $no_id;
        $data_bt->saldo                 = $hasil_total;
        $data_bt->kredit                = $nominal;
        $data_bt->pembayaran            = 0;
        $data_bt->keterangan            = $keterangan;
        $data_bt->status_pendapatan     = 1;
        $data_bt->tanggal_pembayaran    = Carbon::now()->format('Y-m-d');
        $data_bt->save();

        return redirect()->back();
    }

    public function bku()
    {
        $bku = $this->bku->baseBranch()->jenis('kas')->sorted();

        if(request('by')){
            $bku = $bku->search(request('by'), request('q'));
        }

        $bku = $bku->paginate(request('perpage', 10));

        $column = config('library.column.bku');

    	return $this->template('pembayaran.bku', compact(
            'column', 'bku'
        ));
    }
}

// set default last page
// if(request('page') == '') {
//     $lastPage = $akad->paginate(10)->lastPage();
//     Paginator::currentPageResolver(function() use ($lastPage) {
//         return $lastPage;
//     });
// }
