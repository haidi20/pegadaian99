<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;
use App\Models\Saldo_cabang;

use Auth;
use Carbon\Carbon;

class CabangController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Request $request,
                                Kas_cabang $kas_cabang,
                                User_cabang $user_cabang,
                                Saldo_cabang $saldo_cabang
                            )
    {
        $this->cabang       = $cabang;
        $this->request      = $request;
        $this->kas_cabang   = $kas_cabang;
        $this->user_cabang  = $user_cabang;
        $this->saldo_cabang = $saldo_cabang;

        view()->share([
            'menu'         => 'cabang',
            'subMenu'      => '',
            'menuHeader'   => config('library.menu_header')
        ]);
    }

    public function index()
    {
        $nameData   = config('library.special.cabang');
        $nameBranch = $this->cabang->sorted('no_cabang')->get();

        // kasCabang is function scope
        $cabang = $this->cabang->kasCabang()->sorted('cabang.no_cabang', 'desc');

    	return  $this->template('cabang.index', compact(
            'cabang', 'nameBranch', 'nameData'
        ));
    }

    // public function index()
    // {
    //     // kasCabang is function scope
    //     $cabang = $this->cabang->kasCabang()->sorted();

    //     // local function filter
    //     $filter = $this->filter($cabang);

    //     $cabang     = $filter->cabang->paginate(request('perpage', 10));
    //     $dateRange  = $filter->dateRange;

    //     $totalKas   = $this->cabang->kasCabang()->sum('kas_cabang.total_kas');
    //     $totalKas   = nominal($totalKas);

    // 	return  $this->template('cabang.index', compact('cabang', 'dateRange', 'totalKas'));
    // }

    public function filter($cabang)
    {
        // if get data from range date
        if(request('date_start') && request('date_end')){
            $end    =  carbon::parse(request('date_end'));
            $start  =  carbon::parse(request('date_start'));
        }else if(request('daterange')){
            $end    = carbon::parse(substr(request('daterange'), 13, 20));
            $start  = carbon::parse(substr(request('daterange'), 1, 9));
        }else{
            // for default date in form filter date range
            $end    = Carbon::now()->subYear(1);
            $start  = $end;
        }

        if(request('q')){
            $cabang = $cabang->search(request('q'));
        }

        $dateRange  = $start->format('m/d/Y').' - '.$end->format('m/d/Y');

        return (object) compact('cabang', 'dateRange');
    }

    public function create()
    {
        return $this->form();
    }

    public function edit()
    {
        $id    = $this->id_cabang(); 

        return $this->form($id);
    }

    public function form($id = null)
    {
        $findCabang = $this->cabang->find($id);

        if($findCabang){
            session()->flashInput($findCabang->toArray());
            $action = route('cabang.update', $id);
            $method = 'PUT';
        }else{
            session()->flashInput($this->cabang->toArray());
            $action = route('cabang.store');
            $method = 'POST';
        }

    	return  $this->template('cabang.form', compact('action', 'method'));
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
            $type           = 'perbaharui';
            $cabang         = $this->cabang->find($id);

            $validateData   = $this->validateData('edit', $id);
            
            if($validateData->already){
                return $validateData->redirect;
            }
        }else{
            $type                   = 'tambah';
            $cabang                 = $this->cabang;
            $cabang->id_cabang      = uniqid();

            $validateData   = $this->validateData('create');
            
            if($validateData->already){
                return $validateData->redirect;
            }

             // for input value 'modal_awal' to table saldo_cabang
            $saldo_cabang             = $this->saldo_cabang;
            $saldo_cabang->id_cabang  = $cabang->id_cabang;
            $saldo_cabang->total_saldo= remove_dot(request('modal_awal'));
            $saldo_cabang->save();
        }
       
        $cabang->investor       = request('investor');
        $cabang->no_cabang      = request('no_cabang');
        $cabang->nama_cabang    = request('nama_cabang');
        $cabang->telp_cabang    = request('telp_cabang');
        $cabang->alamat_cabang  = request('alamat_cabang');
        $cabang->save();

        $message    = '<strong>Sukses!</strong> Data Cabang telah di '.$type.' dengan Nomor Cabang '.$cabang->no_cabang.
                      ' dan Nama Cabang '.$cabang->nama_cabang.' telah Berhasil';
        flash_message('message', $message);

        return $validateData->redirect;
    }

    public function validateData($type, $id = null)
    {
        if($type == 'edit'){
            $findCabang = $this->cabang->find($id);

            if($findCabang->no_cabang != request('no_cabang')){
                $message    = '<strong>Maaf!</strong> Data Cabang dengan Nomor Cabang '.request('no_cabang').
                              ' Sudah Tersedia';
                flash_message('message', $message, 'danger');

                $already = true; 
            }else{
                $already = false;
            }

            $redirect    = redirect()->route('cabang.edit', $id);
        }elseif($type == 'create'){
            $findCabang = $this->cabang->where('no_cabang', request('no_cabang'))->first();

            if($findCabang){
                $message    = '<strong>Maaf!</strong> Data Cabang dengan Nomor Cabang '.request('no_cabang').
                              ' Sudah Tersedia';
                flash_message('message', $message, 'danger');

                $already = true;
            }else{
                $already = false;
            }

            $redirect= redirect()->route('cabang.create');
        }        

        return (object) compact('already', 'redirect');
    }

    public function api()
    {
        $cabang = $this->cabang->sorted()->get();

        return json_decode($cabang);
    }
}
