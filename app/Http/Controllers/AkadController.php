<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Akad;
use App\Models\Nasabah;
use App\Models\User_cabang;

use Carbon\Carbon;
use Auth;

class AkadController extends Controller
{
    public function __construct(
    							Akad $akad,
    							Nasabah $nasabah,
    							Request $request,
                                User_cabang $user_cabang
                            )
    {
    	$this->akad 		= $akad;
    	$this->nasabah 		= $nasabah;
    	$this->request  	= $request;
        $this->user_cabang  = $user_cabang;

        view()->share([
            'menu'          => 'akad',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    /* code tab-tab in data akad nasabah :
    * na    = nasabah akad
    * ajt   = akad jatuh tempo
    * pl    = pelunasan dan lelang
    */

    public function index()
    {
        // name menu for active menu header
        $menu           = 'database';

        // list table per tab
    	$nasabahAkad    = $this->nasabahAkad();
        $akadJatuhTempo = $this->akadJatuhTempo();              // akadJatuhTempo data array tables base on sum 'jatuh tempo hari'
        $pelunasanLelang= $this->pelunasanLelang();

        // list column per TAB :
        // column for 'akad jatuh tempo'
        $columnAkadJatuhTempo   = config('library.column.akad_nasabah.akad_jatuh_tempo');
        // column for 'nasabah akad'
        $columnListNasabahAkad  = config('library.column.akad_nasabah.list_akad_nasabah');
        // column for 'pelunasan & lelang'
        $columnPelunasanLelang  = config('library.column.akad_nasabah.pelunasan_dan_lelang');

    	return $this->template('akad._index', compact(
            'nasabahAkad', 'akadJatuhTempo', 'pelunasanLelang', 'menu', 
            'columnAkadJatuhTempo', 'columnListNasabahAkad', 'columnPelunasanLelang'
        ));
    }

    // NASABAH AKAD
    public function nasabahAkad()
    {
        // name field 'tanggal jatuh tempo' for sorted
        $nameFieldSorted= 'akad.tanggal_jatuh_tempo';

        $nasabahAkad    = $this->akad->nasabah()->sorted($nameFieldSorted, 'desc');

        // this condition just for 'nasabah akad'
        if(request('perpage_na')){
            // if get data from range date
            if(request('daterange')){
                $end    = carbon::parse(substr(request('daterange'), 13, 20));
                $start  = carbon::parse(substr(request('daterange'), 1, 9));
            }
            // function scope filterRange
            $nasabahAkad= $nasabahAkad->filterRange($start, $end);
            $dateRange  = $start->format('m/d/Y').' - '.$end->format('m/d/Y');
        }else{
            // for default date in form filter date range
            $end        = Carbon::now()->day(30);
            $start      = Carbon::now()->day(1);
            // format dateRange base on template
            $dateRange  = $start->format('m/d/Y').' - '.$end->format('m/d/Y');
        }

        // data from akad and dateRange after filter and use function local filter
        $data           = $nasabahAkad->paginate(request('perpage_na', 10));

        return (object) compact('data', 'dateRange');
    }

    // AKAD JATUH TEMPO
    public function akadJatuhTempo()
    {
        $now = Carbon::now()->format('Y-m-d');

        // list name tables on TAB 'akad jatuh tempo' example list 'jatuh tempo 7 hari', '15 hari' dll.
        $nameTables     = config('library.name_tables.akad_nasabah.akad_jatuh_tempo');
        // name field 'tanggal jatuh tempo' for sorted
        $nameFieldSorted= 'akad.tanggal_jatuh_tempo';
        // 7,15,30,60 days of data
        $sixty          = $this->akad->nasabah()->belumLunas()->sorted($nameFieldSorted, 'desc');
        $thirty         = $this->akad->nasabah()->belumLunas()->sorted($nameFieldSorted, 'desc');
        $sevenDays      = $this->akad->nasabah()->belumLunas()->sorted($nameFieldSorted, 'desc');
        $fifteenDays    = $this->akad->nasabah()->belumLunas()->sorted($nameFieldSorted, 'desc');

        // addDay is scope function
        $nameTables[0]['data']  = $this->filter($sevenDays, 'ajt_7')->akad->addDay('7', 1)->paginate(request('perpage_ajt_7', 10));
        $nameTables[1]['data']  = $this->filter($fifteenDays, 'ajt_15')->akad->addDay('15', 2)->paginate(request('perpage_ajt_15', 10));
        $nameTables[2]['data']  = $this->filter($thirty, 'ajt_30')->akad->addDay('30', 7)->paginate(request('perpage_ajt_30', 10));
        $nameTables[3]['data']  = $this->filter($sixty, 'ajt_60')->akad->addDay('60', 7)->paginate(request('perpage_ajt_60', 10));

        return $nameTables;
    }

    // PELUNASAN DAN LELANG
    public function pelunasanLelang()
    {
        $code   = 'pl_';
        $perpage= 'perpage_';

        // list name tables on TAB 'pelunasan dan lelang' example list 'nasabah lunas, lelang, dan refund'.
        $nameTables     = config('library.name_tables.akad_nasabah.pelunasan_dan_lelang');
        // data of list nasabah lunas, lelang, refund
        $lunas          = $this->akad->nasabah()->lunas()->sorted('akad.tanggal_jatuh_tempo', 'desc');
        $refund         = $this->akad->nasabah()->refund()->sorted('akad.tanggal_jatuh_tempo', 'desc');
        $lelang         = $this->akad->nasabah()->lelang()->sorted('akad.tanggal_jatuh_tempo', 'desc');

        $nameTables[0]['data'] = $this->filter($lunas, $code.'lunas')->akad->paginate(request($perpage.$code.'lunas', 10));
        $nameTables[1]['data'] = $this->filter($refund, $code.'lelang')->akad->paginate(request($perpage.$code.'lelang', 10));
        $nameTables[2]['data'] = $this->filter($lelang, $code.'refund')->akad->paginate(request($perpage.$code.'refund', 10));

        return $nameTables;
    }

    //for filter data from perpage, and query by in index
    public function filter($akad, $code)
    {
        // if get data from input keyword 
        if(request('q_'.$code)){
            $akad   = $akad->search(request('by_'.$code), request('q_'.$code));
        }

        return (object) compact('akad');
    }

    public function create()
    {
    	return $this->form();
    }

    public function edit($id)
    {
    	return $this->form($id);
    }

    public function form($id = null)
    {
    	if($id){
    		$action = route('akad.update', $id);
            $method = 'PUT';
    	}else{
    		$action = route('akad.store');
            $method = 'POST';
    	}

    	$tanggal_akad	     = Carbon::now()->format('Y-m-d');
    	$tanggal_jatuh_tempo = Carbon::now()->addDay('7')->format('Y-m-d');

        // list time example : 1, 7, 15, 30, 60 days. for 'jangka_waktu_akad' and 'opsi_pembayaran'
        $listTime            = config('library.form.akad');

    	return $this->template('akad._form', compact('action', 'method', 'tanggal_akad', 'tanggal_jatuh_tempo', 'listTime'));
    }

    public function store()
    {
    	return $this->save();
    }

    public function update($id)
    {
    	return $this->save($id);
    }

    public function save($id = null)
    {

    	$input 		= $this->request->except('_token');
    	$id_cabang	= $this->user_cabang->baseUsername()->value('id_cabang');
        // return $input;
    	$nasabah 				= $this->nasabah;
    	$nasabah->key_nasabah 	= uniqid();
    	$nasabah->nama_lengkap	= request('nama_lengkap');
    	$nasabah->jenis_kelamin	= request('jenis_kelamin');
    	$nasabah->kota			= request('kota');
    	$nasabah->no_telp		= request('no_telp');
    	$nasabah->jenis_id		= request('jenis_id');
    	$nasabah->no_identitas	= request('no_identitas');
    	$nasabah->tanggal_lahir	= request('tanggal_lahir');
    	$nasabah->alamat		= request('alamat');
    	$nasabah->tanggal_daftar= Carbon::now()->format('Y-m-d');
    	$nasabah->save();

    	$akad 						= $this->akad;
    	$akad->id_cabang 			= $id_cabang;
    	$akad->no_id 				= request('no_id');
    	$akad->key_nasabah 			= $nasabah->key_nasabah;
    	$akad->nama_barang			= request('nama_barang'); 
    	$akad->jenis_barang			= request('jenis_barang'); 
    	$akad->kelengkapan			= request('kelengkapan'); 
    	$akad->kekurangan			= request('kekurangan'); 
    	$akad->jangka_waktu_akad	= number_format(request('jangka_waktu_akad')); 
    	$akad->tanggal_akad			= request('tanggal_akad'); 
    	$akad->tanggal_jatuh_tempo	= request('tanggal_jatuh_tempo'); 
    	$akad->nilai_tafsir			= remove_dot(request('taksiran_marhun')); 
    	$akad->nilai_pencairan		= remove_dot(request('marhun_bih')); 
    	$akad->bt_7_hari			= remove_dot(request('biaya_titip')); 
    	$akad->biaya_admin			= request('biaya_admin'); 
    	$akad->terbilang			= request('terbilang'); 
    	$akad->status				= 'Belum Lunas';
    	$akad->save(); 

        $message    = '<strong>Sukses!</strong> Data Akad Nasabah berhasil di tambahkan';
        flash_message('message', $message);

    	return redirect()->route('akad.index');
    }

    public function destroy($id)
    {

    }

}
