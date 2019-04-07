<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Akad;
use App\Models\Nasabah;
use App\Models\Kas_cabang;
use App\Models\User_cabang;

use Carbon\Carbon;
use Auth;

class AkadController extends Controller
{
    public function __construct(
    							Akad $akad,
    							Nasabah $nasabah,
    							Request $request,
                                Kas_cabang $kas_cabang,
    							User_cabang $user_cabang
                            )
    {
    	$this->akad 		= $akad;
    	$this->nasabah 		= $nasabah;
    	$this->request  	= $request;
        $this->kas_cabang   = $kas_cabang;
    	$this->user_cabang 	= $user_cabang;

        view()->share([
            'menu'          => 'akad',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    /*
    * na    = nasabah akad
    * ajt   = akad jatuh tempo
    * pl    = pelunasan dan lelang
    */

    public function index()
    {
        $menu           = 'database';
    	$nasabahAkad    = $this->akad->nasabah()->sorted();
        $akadJatuhTempo = $this->akadJatuhTempo();              // akadJatuhTempo data array tables base on sum 'jatuh tempo hari'
        $pelunasanLelang= $this->akad->nasabah()->sorted();

        // list column per TAB
        // column for 'akad jatuh tempo'
        $columnAkadJatuhTempo   = config('library.column.akad_nasabah.akad_jatuh_tempo');
        // column for 'nasabah akad'
        $columnListNasabahAkad  = config('library.column.akad_nasabah.list_akad_nasabah');
        // column for 'pelunasan & lelang'
        $columnPelunasanLelang  = config('library.column.akad_nasabah.pelunasan_dan_lelang');

        // data from akad and dateRange after filter and use function local filter
        $dateRange      = $this->filter($nasabahAkad, 'na')->dateRange;
        $nasabahAkad    = $this->filter($nasabahAkad, 'na')->akad->paginate(request('perpage_na', 10));

    	return $this->template('akad._index', compact(
            'nasabahAkad', 'akadJatuhTempo', 'menu', 'dateRange', 
            'columnAkadJatuhTempo', 'columnListNasabahAkad', 'columnPelunasanLelang'
        ));
    }

    public function akadJatuhTempo()
    {
        $now = Carbon::now()->format('Y-m-d');

        // list name tables on TAB 'akad jatuh tempo' example list jatuh tempo 7 hari, 15 hari dll.
        $nameTables     = config('library.name_tables.akad_nasabah.akad_jatuh_tempo');
        // 7,15,30,60 days of data
        $sixty          = $this->akad->nasabah()->sorted('tanggal_jatuh_tempo');
        $thirty         = $this->akad->nasabah()->sorted('tanggal_jatuh_tempo');
        $sevenDays      = $this->akad->nasabah()->sorted('tanggal_jatuh_tempo');
        $fifteenDays    = $this->akad->nasabah()->sorted('tanggal_jatuh_tempo');

        // subDay is scope function
        $nameTables[0]['data']  = $this->filter($sevenDays, 'ajt_7')->akad->subDay('7', 1)->paginate(request('perpage_ajt_7', 10));
        $nameTables[1]['data']  = $this->filter($fifteenDays, 'ajt_15')->akad->subDay('15', 2)->paginate(request('perpage_ajt_15', 10));
        $nameTables[2]['data']  = $this->filter($thirty, 'ajt_30')->akad->subDay('30', 7)->paginate(request('perpage_ajt_30', 10));
        $nameTables[3]['data']  = $this->filter($sixty, 'ajt_60')->akad->subDay('60', 7)->paginate(request('perpage_ajt_60', 10));

        return $nameTables;
    }

    // for filter data from date range, perpage, and query by in index
    public function filter($akad, $code)
    {
        if(request('perpage_'.$code) && $code == 'na'){
            // if get data from range date
            if(request('daterange')){
                $end    = carbon::parse(substr(request('daterange'), 13, 20));
                $start  = carbon::parse(substr(request('daterange'), 1, 9));
            }

            // function scope filterRange
            $akad       = $akad->filterRange($start, $end);
            $dateRange  = $start->format('m/d/Y').' - '.$end->format('m/d/Y');
        }else{
            // for default date in form filter date range
            $end        = Carbon::now()->subYear(1);
            $start      = $end;

            $dateRange  = $start->format('m/d/Y').' - '.$end->format('m/d/Y');
        }

        // if get data from input keyword 
        if(request('by_'.$code)){
            $akad   = $akad->search(request('by_'.$code), request('q_'.$code));
        }

        return (object) compact('dateRange', 'akad');
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

    	$tanggal_akad	= Carbon::now()->format('Y-m-d');
    	$tanggal_jatuh 	= Carbon::now()->addYear()->subDay()->format('Y-m-d');

    	return $this->template('akad._form', compact('action', 'method', 'tanggal_akad', 'tanggal_jatuh'));
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
    	$akad->bt_7_hari			= request('bt_7_hari'); 
    	$akad->biaya_admin			= request('biaya_admin'); 
    	$akad->terbilang			= request('terbilang'); 
    	$akad->status				= 'lunas';
    	$akad->save(); 

        $message    = '<strong>Sukses!</strong> Data Akad Nasabah berhasil di tambahkan';
        flash_message('message', $message);

    	return redirect()->route('akad.index');
    }

    public function destroy($id)
    {

    }

}
