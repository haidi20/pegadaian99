<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Akad;
use App\Models\Nasabah;

use Carbon\Carbon;

class AkadController extends Controller
{
    public function __construct(
    							Akad $akad,
    							Nasabah $nasabah,
                                Request $request
                            )
    {
    	$this->akad 	= $akad;
    	$this->nasabah 	= $nasabah;
        $this->request  = $request;
    }

    public function index()
    {
    	$akad = $this->akad->nasabah()->orderBy('id_akad')->paginate(10);

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

    	return view('akad.form', compact('action', 'method'));
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
    	$input = $this->request->except('_token');

    	$nasabah = $this->nasabah;
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

    	return redirect()->route('akad.index');
    }

    public function destroy($id)
    {

    }

}
