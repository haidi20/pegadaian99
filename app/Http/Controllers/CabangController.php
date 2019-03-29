<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\User_cabang;

use Auth;

class CabangController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Request $request,
                                User_cabang $user_cabang
                            )
    {
        $this->cabang           = $cabang;
        $this->request          = $request;
        $this->user_cabang      = $user_cabang;

        view()->share([
            'menu'          => 'cabang',
            'menu_header'   => config('library.menu_header'),
        ]);
    }

    public function index()
    {
        $cabang = $this->cabang->orderBy('id_cabang', 'desc')->paginate(5);

    	return view('cabang.index', compact('cabang'));
    }

    public function create()
    {
    	return $this->form();
    }

    public function edit()
    {
        $id    = $this->user_cabang->baseUsername()->value('id_cabang'); 

        return $this->form($id);
    }

    public function form($id = null)
    {
        $cariCabang = $this->cabang->find($id);

        if($cariCabang){
            session()->flashInput($cariCabang->toArray());
            $action = route('cabang.update', $id);
            $method = 'PUT';
        }else{
            $action = route('cabang.store');
            $method = 'store';
        }   

    	return view('cabang.form', compact('action', 'method'));
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

        if($id){
            $type   = 'perbaharui';
            $cabang = $this->cabang->find($id);
        }else{
            $type   = 'tambah';
            $cabang = $this->cabang;
        }    

        $cabang->id_cabang      = uniqid();
        $cabang->investor       = request('investor');
        $cabang->no_cabang      = request('no_cabang');
        $cabang->nama_cabang    = request('nama_cabang');
        $cabang->telp_cabang    = request('telp_cabang');
        $cabang->alamat_cabang  = request('alamat_cabang');
        $cabang->save();

        $message    = '<strong>Sukses!</strong> Data Cabang telah di '.$type.' dengan Nomor Cabang '.$cabang->no_cabang.
                      ' dan Nama Cabang '.$cabang->nama_cabang.' telah Berhasil';
        flash_message('message', $message);

        return redirect()->route('cabang.index');
    }

    public function index_setting()
    {
        $menu           = 'setting';
        $cabang         = $this->cabang->shortedNoCabang()->get();
        $user_cabang    = $this->user_cabang;
        // how to fetch data by username of user
        $user_cabang    = $user_cabang->baseUsername()->value('id_cabang');

        return view('cabang.setting', compact('user_cabang', 'cabang', 'menu'));

    }

    public function store_setting()
    {
        $user_cabang                = $this->user_cabang->baseUsername()->first();
        $user_cabang->id_cabang     = request('id_cabang');
        $user_cabang->save();

        return redirect()->route('cabang.setting');
    }
}
