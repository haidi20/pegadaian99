<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Akad;
use App\Models\Nasabah;
use App\Models\user_cabang;

use Carbon\Carbon;

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
    	$this->user_cabang 	= $user_cabang;
        
    }

    public function index()
    {
    	$akad = $this->akad->nasabah()->orderBy('id_akad', 'desc')->paginate(10);    	

    	return view('akad.index', compact('akad'));
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

    	return view('akad.form', compact('action', 'method', 'tanggal_akad', 'tanggal_jatuh'));
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
    	$akad->jangka_waktu_akad	= request('jangka_waktu_akad'); 
    	$akad->tanggal_akad			= request('tanggal_akad'); 
    	$akad->tanggal_jatuh_tempo	= request('tanggal_jatuh_tempo'); 
    	$akad->nilai_tafsir			= request('taksiran_marhun'); 
    	$akad->nilai_pencairan		= request('marhun_bih'); 
    	$akad->bt_7_hari			= request('bt_7_hari'); 
    	$akad->biaya_admin			= request('biaya_admin'); 
    	$akad->terbilang			= request('terbilang'); 
    	$akad->status				= 'lunas';
    	$akad->save(); 

    	return redirect()->route('akad.index');
    }

    public function destroy($id)
    {

    }

}
