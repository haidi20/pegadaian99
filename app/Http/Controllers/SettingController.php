<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Login;
use App\Models\Cabang;
use App\Models\Setting;
use App\Models\User_cabang;

use auth;

class SettingController extends Controller
{
    public function __construct(
                                Login $login,
                                Cabang $cabang,
                                Setting $setting,
                                Request $request,
                                User_cabang $user_cabang
                            )
    {
        $this->login            = $login;
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
    	$setting = $this->setting->baseBranch()->first();

    	return $this->template('setting.index', compact('setting'));
    }

    public function store()
    {
        $input = $this->request->except('_token');
        // return $input;
        // return (double) remove_dot($input['potongan']);
        // return remove_dot(request('potongan'));
        
    	if(request('id')){
    		$setting 			= $this->setting->find(request('id'));
    	}else{
    		$setting 			= $this->setting;
    	}

        $user_cabang                = User_cabang::baseUsername()->first();
    	$setting->id_cabang         = $user_cabang->id_cabang;
    	$setting->potongan          = remove_dot($input['potongan']);
    	$setting->margin_kendaraan  = request('margin_kendaraan');
    	$setting->margin_elektronik = request('margin_elektronik');
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
        $login = $this->login->sorted();

        if(request('by')){
            $login = $login->search(request('by'), request('q'));
        }

        $login = $login->paginate(request('perpage', 10));

        $column = config('library.column.login');

        return $this->template('setting.login', compact('column', 'login'));
    }

    public function coba()
    {
        $coba = 'pesan';

        return response()->json(compact('coba'));
    }
}
