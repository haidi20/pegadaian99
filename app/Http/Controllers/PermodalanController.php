<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Hutang;
use App\Models\Refund;
use App\Models\User_cabang;
use App\Models\Penambahan_modal;

use Auth;
use Carbon\Carbon;

class PermodalanController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Hutang $hutang,
                                Refund $refund,
                                Request $request,
                                Penambahan_modal $tambahModal
                            )
    {
        $this->cabang       = $cabang;
        $this->hutang       = $hutang;
        $this->refund       = $refund;
        $this->request      = $request;
        $this->tambahModal  = $tambahModal;

        view()->share([
            'menu'          => 'permodalan',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function create()
    {
        $featureUrl = request()->segment(3);

        if($featureUrl == 'tambah-saldo'){
            $feature = 'Tambah Saldo';
        }else{
            $feature = 'refund saldo';
        }

        $cabang  = $this->cabang->all();

    	return $this->template('permodalan.form', compact('feature', 'cabang'));
    }

    public function store()
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first(); 

        $input = $this->request->except('_token');

        // return $input;

        if(request('jenis_modal') == 'hutang_cabang'){

        }elseif(request('jenis_modal') == 'hutang_personal'){
            // local function
            $this->hutang_personal($user_cabang);
        }elseif(request('jenis_modal') == 'penambahan_kas_saldo'){
            // local function
            $this->tambah_modal($user_cabang);            
        }elseif(request('jenis_modal') == 'refund_saldo'){
            // local function
            $this->refund_saldo($user_cabang);
        }

        $jenis_modal = str_replace('_', ' ', request('jenis_modal'));

        $message = '<strong>Sukses!</strong> Data '.$jenis_modal.' berhasil di tambah';
        flash_message('message', $message);

        // condition for after insert data redirect page base on 'jenis_modal'
        $route = request('jenis_modal') == 'refund_saldo' ? 'permodalan.create.refund-saldo' : 'permodalan.create.tambah-saldo';

        return redirect()->route($route);
    }

    // proccess input data into table 'hutang'
    public function hutang_personal($user_cabang)
    {
        $hutang                     = $this->hutang;
        $hutang->id_cabang          = $user_cabang->id_cabang;
        $hutang->status_hutang      = 'Belum Lunas';
        $hutang->jumlah_hutang      = remove_dot(request('jumlah'));
        $hutang->tanggal_hutang     = Carbon::now()->format('Y-m-d');
        $hutang->keterangan_hutang  = request('keterangan');
        $hutang->save();
    }

    // proccess input data into table 'penambahan_modal'
    public function tambah_modal($user_cabang)
    {
        $tambahModal            = $this->tambahModal;
        $tambahModal->jumlah    = remove_dot(request('jumlah'));
        $tambahModal->tanggal   = Carbon::now()->format('Y-m-d');
        $tambahModal->id_cabang = $user_cabang->id_cabang;
        $tambahModal->keterangan= request('keterangan');
        $tambahModal->save();
    }

    // proccess input data into table 'refund'
    public function refund_saldo($user_cabang)
    {
        $refund            = $this->refund;
        $refund->uraian    = request('keterangan');
        $refund->jumlah    = remove_dot(request('jumlah'));
        $refund->tanggal   = Carbon::now()->format('Y-m-d');
        $refund->id_cabang = $user_cabang->id_cabang;
        $refund->save();
    }

    public function penambahan()
    {
        $column = config('library.column.penambahan');

        $tambahModal = $this->tambahModal->sorted();

        if(request('by')){
            $tambahModal = $tambahModal->search(request('by'), request('q'));
        }

        $tambahModal     = $tambahModal->paginate(request('perpage', 10));

    	return $this->template('permodalan.penambahan', compact('column', 'tambahModal'));
    }

    public function list_refund()
    {
        $column = config('library.column.list_refund');

        $refund = $this->refund->sorted();

        if(request('by')){
            $refund = $refund->search(request('by'), request('q'));
        }

        $refund     = $refund->paginate(request('perpage', 10));

    	return $this->template('permodalan.list-refund', compact('column', 'refund'));
    }

    public function hutang()
    {
        $nameTables = config('library.name_tables.hutang_piutang');

        $hutang_personal = $this->hutang->sorted()->paginate(request('by', 10));

        $nameTables[0]['data'] = $hutang_personal;
        $nameTables[1]['data'] = $hutang_personal;
        $nameTables[2]['data'] = $hutang_personal;

        $column     = config('library.column.hutang_piutang');

        // return $nameTables;

    	return $this->template('permodalan.hutang-piutang', compact(
            'nameTables', 'column'
        ));
    }
}
