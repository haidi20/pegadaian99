<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Hutang;
use App\Models\Refund;
use App\Models\Hutang_cabang;
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
                                Hutang_cabang $hutang_cabang,
                                Penambahan_modal $tambahModal
                            )
    {
        $this->cabang       = $cabang;
        $this->hutang       = $hutang;
        $this->refund       = $refund;
        $this->request      = $request;
        $this->tambahModal  = $tambahModal;
        $this->hutang_cabang= $hutang_cabang;

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
        $input = $this->request->except('_token');

        // return $input;

        if(request('jenis_modal') == 'hutang_cabang'){
            // not yet
        }elseif(request('jenis_modal') == 'hutang_personal'){
            // local function
            $this->hutang_personal();
        }elseif(request('jenis_modal') == 'penambahan_kas_saldo'){
            // local function
            $this->tambah_modal();            
        }elseif(request('jenis_modal') == 'refund_saldo'){
            // local function
            $this->refund_saldo();
        }

        $jenis_modal = str_replace('_', ' ', request('jenis_modal'));

        $message = '<strong>Sukses!</strong> Data '.$jenis_modal.' berhasil di tambah';
        flash_message('message', $message);

        // condition for after insert data redirect page base on 'jenis_modal'
        $route = request('jenis_modal') == 'refund_saldo' ? 'permodalan.create.refund-saldo' : 'permodalan.create.tambah-saldo';

        return redirect()->route($route);
    }

    // proccess input data into table 'hutang'
    public function hutang_personal()
    {
        $hutang                     = $this->hutang;
        $hutang->id_cabang          = $this->id_cabang();
        $hutang->status_hutang      = 'Belum Lunas';
        $hutang->jumlah_hutang      = remove_dot(request('jumlah'));
        $hutang->tanggal_hutang     = Carbon::now()->format('Y-m-d');
        $hutang->keterangan_hutang  = request('keterangan');
        $hutang->save();
    }

    // proccess input data into table 'penambahan_modal'
    public function tambah_modal()
    {
        $tambahModal            = $this->tambahModal;
        $tambahModal->jumlah    = remove_dot(request('jumlah'));
        $tambahModal->tanggal   = Carbon::now()->format('Y-m-d');
        $tambahModal->id_cabang = $this->id_cabang();
        $tambahModal->keterangan= request('keterangan');
        $tambahModal->save();
    }

    // proccess input data into table 'refund'
    public function refund_saldo()
    {
        $refund            = $this->refund;
        $refund->uraian    = request('keterangan');
        $refund->jumlah    = remove_dot(request('jumlah'));
        $refund->tanggal   = Carbon::now()->format('Y-m-d');
        $refund->id_cabang = $this->id_cabang();
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

        $hutang_cabang      = $this->hutang_cabang->sorted();
        $piutang_cabang     = $this->hutang_cabang->sorted();
        $hutang_personal    = $this->hutang->sorted();

        $nameTables[0]['data'] = $this->filter($hutang_personal, 'hp')->hutang->paginate(request('perpage_hp', 10));
        $nameTables[1]['data'] = $this->filter($hutang_cabang, 'hc')->hutang->paginate(request('perpage_hc', 10));
        $nameTables[2]['data'] = $this->filter($piutang_cabang, 'pc')->hutang->paginate(request('perpage_pc', 10));

        $column     = config('library.column.hutang_piutang');

        // return $nameTables;

    	return $this->template('permodalan.hutang-piutang', compact(
            'nameTables', 'column'
        ));
    }

    //for filter data from perpage, and query by in index
    public function filter($hutang, $code)
    {
        // if get data from input keyword 
        if(request('q_'.$code)){
            $hutang   = $hutang->search(request('by_'.$code), request('q_'.$code));
        }

        return (object) compact('hutang');
    }

    // proccess change status from 'Belum Lunas' to 'Lunas' on 'hutang personal' & 'hutang cabang'
    public function change_status($id, $code)
    {
        if($code == 'hp'){
            $hutang_personal = $this->hutang->find($id);
            $hutang_personal->status_hutang = 'Lunas';
            $hutang_personal->save();
        }else{
            $hutang_cabang = $this->hutang_cabang->find($id);
            $hutang_cabang->status = 'Lunas';
            $hutang_cabang->save();
        }

        return redirect()->route('permodalan.hutang');
    }
}
