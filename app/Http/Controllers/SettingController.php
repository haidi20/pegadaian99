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
        $cabang     = $this->cabang->get();
        $setting    = $this->setting->get();
        $userCabang = $this->user_cabang->first();  

    	return $this->template('setting.index', compact('setting', 'cabang', 'userCabang'));
    }

    public function update($id)
    {
        return $this->save($id);
    }

    public function store()
    {
        return $this->save();
    }

    public function save($id = null)
    {
        $setting = $this->setting->find($id);
        $status = 'edit';

        return response()->json(compact('setting', 'status'));
    }

    public function delete($id)
    {
        $setting = $this->setting->find($id);
        $status = 'delete';

        return response()->json(compact('setting', 'status'));
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

    // public function data()
    // {
    //     $inputan = $this->request->except('_token');

    //     if(request('action') == 'edit'){
    //         if(request('value_id')){
    //             $setting    = $this->setting->find(request('value_id'));
    //         }else{
    //             $setting    = $this->setting;
    //         }

    //         $validasiData = $this->validasi_data();

    //         if($validasiData->condition){
    //             $value_id = '';
    //             $message = $validasiData->message;
    //         }else{
    //             $setting->margin        = request('margin');
    //             $setting->potongan      = remove_dot(request('potongan'));
    //             $setting->id_cabang     = request('id_cabang');
    //             $setting->jenis_barang  = request('jenis_barang');
    //             $setting->save();

    //             $value_id = $setting->id;
    //             $message = 'Pengaturan Margin Telah Diperbaharui';
    //         }
    //     }

    //     if(request('action') == 'delete'){
    //         $setting = $this->setting->find(request('clone_id'));
    //         $setting->delete();

    //         $value_id = request('clone_id');
    //         $message = 'Pengaturan Margin Telah Dihapus';
    //     }

    //     return response()->json(compact('inputan', 'setting', 'value_id', 'message'));
    // }

    // public function validasi_data()
    // {
    //     $validasiData   = $this->setting->where(['jenis_barang' => request('jenis_barang'), 'id_cabang' => request('id_cabang')])->first();

    //     if($validasiData){
    //         if($validasiData->id != request('value_id')){
    //             $message    = 'Maaf, data cabang dan jenis barang sudah ada';
    //             $condition  = true;
    //         }else{
    //             $message = '';
    //             $condition  = false;
    //         }
    //     }else{
    //         $message = '';
    //         $condition  = false;
    //     }

    //     return (object) compact('message', 'condition');
    // }
}
