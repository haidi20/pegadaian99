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
    }

    public function index()
    {
    	return view('cabang.index');
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
            $action = route('cabang.update',$id);
            $method = 'PUT';
        }else{
            $action = route('cabang.store');
            $method = 'PUT';
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
            $cabang = $this->cabang->find($id);
        }else{
            $cabang = $this->cabang;
        }    

        $cabang->investor       = request('investor');
        $cabang->no_cabang      = request('no_cabang');
        $cabang->nama_cabang    = request('nama_cabang');
        $cabang->telp_cabang    = request('telp_cabang');
        $cabang->alamat_cabang  = request('alamat_cabang');
        $cabang->save();

        return redirect()->route('cabang.index');
    }

    public function index_setting()
    {
        $cabang         = $this->cabang->shortedNoCabang()->get();
        $user_cabang    = $this->user_cabang;
        // how to fetch data by username of user
        $user_cabang    = $user_cabang->baseUsername()->value('id_cabang');

        return view('cabang.setting', compact('user_cabang', 'cabang'));

    }

    public function store_setting()
    {
        $user_cabang                = $this->user_cabang->baseUsername()->first();
        $user_cabang->id_cabang     = request('id_cabang');
        $user_cabang->save();

        return redirect()->route('cabang.setting');
    }
}
