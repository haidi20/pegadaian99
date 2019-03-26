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

    public function edit($id)
    {
        return $this->form($id);
    }

    public function form($id = null)
    {
    	return view('cabang.form');
    }

    public function store()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        $input = $this->request->except('_token');

        $cabang = $this->cabang;
        $cabang->create([
            'investor'       => request('investor'),
            'no_cabang'      => request('no_cabang'),
            'nama_cabang'    => request('nama_cabang'),
            'telp_cabang'    => request('telp_cabang'),
            'alamat_cabang'  => request('alamat_cabang'),
        ]);

        return redirect()->route('cabang.index');
    }

    public function index_setting()
    {
        $cabang         = $this->cabang->all();
        $user_cabang    = $this->user_cabang;

        // how to fetch data base username of user
        $user_cabang = $user_cabang->fetchData()->value('id_cabang');

        return $cabang;

        // return view('cabang.setting', compact('user_cabang', 'cabang'));

    }

    public function store_setting()
    {
        return request('nomor_cabang');
    }
}
