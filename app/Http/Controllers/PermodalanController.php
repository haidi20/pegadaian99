<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Hutang;
use App\Models\User_cabang;
use App\Models\Penambahan_modal;

use Auth;
use Carbon\Carbon;

class PermodalanController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Hutang $hutang,
                                Request $request,
                                Penambahan_modal $tambahModal
                            )
    {
        $this->cabang       = $cabang;
        $this->hutang       = $hutang;
        $this->request      = $request;
        $this->tambahModal  = $tambahModal;

        view()->share([
            'menu'          => 'permodalan',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function create()
    {
        $feature = 'Tambah Saldo';

        $cabang  = $this->cabang->all();

    	return $this->template('permodalan.form', compact('feature', 'cabang'));
    }

    public function store()
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first(); 

        $input = $this->request->except('_token');

        if(request('jenis_modal') == 'hutang_cabang'){

        }elseif(request('jenis_modal') == 'hutang_personal'){
            $hutang                     = $this->hutang;
            $hutang->id_cabang          = $user_cabang->id_cabang;
            $hutang->status_hutang      = 'Belum Lunas';
            $hutang->jumlah_hutang      = request('jumlah');
            $hutang->tanggal_hutang     = Carbon::now()->format('Y-m-d');
            $hutang->keterangan_hutang  = request('keterangan');
            $hutang->save();
        }else{
            $tambahModal = $this->tambahModal;
            $tambahModal->tanggal   = Carbon::now()->format('Y-m-d');
            $tambahModal->jumlah    = request('jumlah');
            $tambahModal->keterangan= request('keterangan');
            $tambahModal->id_cabang = $user_cabang->id_cabang;
            $tambahModal->save();            
        }

        $jenis_modal = str_replace('_', ' ', request('jenis_modal'));

        $message    = '<strong>Sukses!</strong> Data '.$jenis_modal.' berhasil di tambah';
        flash_message('message', $message);

        return redirect()->route('permodalan.create');
    }

    public function penambahan()
    {
        $column = config('library.column.penambahan');

    	return $this->template('permodalan.penambahan', compact('column'));
    }

    public function refund()
    {
        $feature = 'refund saldo';

    	return $this->template('permodalan.form', compact('feature'));
    }

    public function list_refund()
    {
        $column = config('library.column.list_refund');

    	return $this->template('permodalan.list-refund', compact('column'));
    }

    public function hutang()
    {
        $nameTables = config('library.name_tables.hutang_piutang');

        $column     = config('library.column.hutang_piutang');

    	return $this->template('permodalan.hutang-piutang', compact('nameTables', 'column'));
    }
}
