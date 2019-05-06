<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Setting;
use App\Models\User_cabang;

use auth;

class SettingController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Setting $setting,
                                Request $request,
                                User_cabang $user_cabang
                            )
    {
        $this->cabang           = $cabang;
        $this->setting          = $setting;
        $this->request          = $request;
        $this->user_cabang      = $user_cabang;

        view()->share([
            'menu'         => 'setting',
            'menuHeader'   => config('library.menu_header')
        ]);
    }

    public function index()
    {
    	$setting = $this->setting->first();

    	return $this->template('setting.index', compact('setting'));
    }

    public function store()
    {
    	$input = $this->request->except('_token');
    	
    	if(request('id')){
    		$setting 			= $this->setting->find(request('id'));
    	}else{
    		$setting 			= $this->setting;
    	}

    	$setting->persenan 		= request('persenan');
    	$setting->biaya_titip	= request('biaya_titip');
    	$setting->save();

    	return redirect()->route('setting.index');
    }

    public function pilih_cabang()
    {
        $cabang         = $this->cabang->shortedNoCabang()->get();
        $user_cabang    = $this->user_cabang;
        // how to fetch data by username of user
        $user_cabang    = $user_cabang->baseUsername()->value('id_cabang');

        return  $this->template('setting.pilih-cabang', compact('user_cabang', 'cabang'));

    }

    public function pilih_cabang_store()
    {
        $input = $this->request->except('_token');
        // return $input;

        $user_cabang                = $this->user_cabang->firstOrNew(['username' => 'admin']);
        $user_cabang->id_cabang     = request('id_cabang');
        $user_cabang->save();

        $cabang     = $this->cabang->find(request('id_cabang'));

        $message    = '<strong>Sukses!</strong> Data cabang anda saat ini cabang nomor '
                      .$cabang->no_cabang.'  telah Berhasil';
        flash_message('message', $message);

        return redirect()->route('setting.pilih-cabang');
    }

    public function login()
    {
        $column = config('library.column.login');

        return $this->template('setting.login', compact('column'));
    }
}
