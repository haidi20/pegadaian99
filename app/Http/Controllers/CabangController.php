<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Atk;
use App\Models\Akad;
use App\Models\Cabang;
use App\Models\Refund;
use App\Models\Hutang;
use App\Models\Hutang_kas;
use App\Models\Kas_cabang;
use App\Models\User_cabang;
use App\Models\Saldo_cabang;
use App\Models\Hutang_cabang;
use App\Models\Penambahan_modal;

use App\Models\Log\Log_saldo_cabang;

use Auth;
use Carbon\Carbon;

class CabangController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Request $request,
                                Kas_cabang $kas_cabang,
                                User_cabang $user_cabang,
                                Saldo_cabang $saldo_cabang,
                                Penambahan_modal $penambahan_modal
                            )
    {
        $this->cabang           = $cabang;
        $this->request          = $request;
        $this->kas_cabang       = $kas_cabang;
        $this->user_cabang      = $user_cabang;
        $this->saldo_cabang     = $saldo_cabang;
        $this->penambahan_modal = $penambahan_modal;

        view()->share([
            'menu'         => 'cabang',
            'subMenu'      => '',
            'menuHeader'   => config('library.menu_header')
        ]);
    }

    public function index()
    {
        $nameData       = config('library.special.cabang');
        
        $cabang = $this->cabang->sorted('no_cabang')->get();

        $data   = $this->countingBranch($cabang, $nameData);

    	return  $this->template('cabang.index', compact(
            'cabang', 'nameData', 'data'
        ));
    }

    public function countingBranch($cabang, $nameData)
    {
        $data = [];

        foreach ($nameData as $index => $item) {
            foreach ($cabang as $key => $value) {
                $id = $value->id_cabang;

                $data[0][$value->id_cabang] = $this->modalCabang($id);
                $data[1][$value->id_cabang] = $this->pinjaman($id);
                $data[2][$value->id_cabang] = $this->hutang($id);
                $data[3][$value->id_cabang] = $this->Piutang($id);
                $data[4][$value->id_cabang] = $this->refund($id);
                $data[5][$value->id_cabang] = $this->sisaSaldo($id);
                $data[6][$value->id_cabang] = $this->biayaTitipBulan($id);
                $data[7][$value->id_cabang] = $this->biayaAdminAkad($id);
                $data[8][$value->id_cabang] = $this->biayaAdminLelang($id);
                $data[9][$value->id_cabang] = $this->jmlAkadBulan($id);
                $data[10][$value->id_cabang] = $this->saldoKasAdministrasi($id);
                $data[11][$value->id_cabang] = $this->hutangBiayaOperasional($id);
                $data[12][$value->id_cabang] = $this->biayaOperasional($id);
            }
        }

        return $data;
    }

    public function modalCabang($id)
    {
        $kasCabang      = Kas_cabang::where('id_cabang', $id)->first();
        $saldoCabang    = Saldo_cabang::where('id_cabang', $id)->first();

        $totalKas   = $kasCabang ? $kasCabang->total_kas : 0;
        $totalSaldo = $saldoCabang ? $saldoCabang->total_saldo : 0;

        $result = $totalSaldo + $totalKas;

        $result = $result ? 'Rp. '.nominal($result) : 0;

        return $result;
    }

    public function pinjaman($id)
    {
        $nilaiPencairan = Akad::where('id_cabang', $id)->sum('nilai_pencairan');
        
        $result = $nilaiPencairan ? 'Rp. '.nominal($nilaiPencairan) : 0;

        return $result;
    }

    public function hutang($id)
    {
        $jumlahHutang       = Hutang::baseBranch($id)->status('Belum Lunas')->sum('jumlah_hutang');
        $jumlahHutangCabang = Hutang_cabang::baseBranch($id, 'id_hutang')->status('Belum Lunas')->sum('jumlah');

        $hutang = $jumlahHutang + $jumlahHutangCabang;

        $result = $hutang ? 'Rp. '.nominal($hutang) : 0;

        return $result;
    }

    public function piutang($id)
    {
        $jumlah = Hutang_kas::baseBranch($id)->status('Belum Lunas')->sum('jumlah');

        $result = $jumlah ? 'Rp. '.nominal($jumlah) : 0;

        return $result;
    }

    public function refund($id)
    {
        $jumlah = Refund::where('id_cabang', $id)->sum('jumlah');

        $result = $jumlah ? 'Rp. '.nominal($jumlah) : 0;

        return $result;
    }

    public function sisaSaldo($id)
    {
        $totalSaldo = Saldo_cabang::where('id_cabang', $id)->value('total_saldo');

        $result = $totalSaldo ? 'Rp. '.nominal($totalSaldo) : 0;

        return $result;
    }

    public function biayaTitipBulan($id)
    {
        $result = 0;

        return $result;
    }

    public function biayaAdminAkad($id)
    {
        $biayaAdmin = Akad::where('id_cabang', $id)->sum('biaya_admin');

        $result = $biayaAdmin ? 'Rp. '.nominal($biayaAdmin) : 0;

        return $result;
    }

    public function biayaAdminLelang($id)
    {
        $result = 0;

        return $result;
    }

    public function jmlAkadBulan($id)
    {
        $result = Akad::where('id_cabang', $id)->sum('jangka_waktu_akad');

        return $result;
    }

    public function saldoKasAdministrasi($id)
    {
        $totalKas = Kas_cabang::where('id_cabang', $id)->value('total_kas');

        $result = $totalKas ? 'Rp. '.nominal($totalKas) : 0;

        return $result;
    }

    public function hutangBiayaOperasional($id)
    {
        $jumlah = Hutang_kas::baseBranch($id)->status('Belum Lunas')->sum('jumlah');

        $result = $jumlah ? 'Rp. '.nominal($jumlah) : 0;

        return $result;
    }

    public function biayaOperasional($id)
    {
        $jumlahAtk = Atk::where('id_cabang', $id)->sum('jumlah_atk');

        $result = $jumlahAtk ? 'Rp. '.nominal($jumlahAtk) : 0;

        return $result;
    }

    // public function filter($cabang)
    // {
    //     // if get data from range date
    //     if(request('date_start') && request('date_end')){
    //         $end    =  carbon::parse(request('date_end'));
    //         $start  =  carbon::parse(request('date_start'));
    //     }else if(request('daterange')){
    //         $end    = carbon::parse(substr(request('daterange'), 13, 20));
    //         $start  = carbon::parse(substr(request('daterange'), 1, 9));
    //     }else{
    //         // for default date in form filter date range
    //         $end    = Carbon::now()->subYear(1);
    //         $start  = $end;
    //     }

    //     $cabang     = $cabang->filterRange($start, $end);
    //     $dateRange  = $start->format('m/d/Y').' - '.$end->format('m/d/Y');

    //     return (object) compact('cabang', 'dateRange');
    // }

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
            $type           = 'Memperbaharui';
            $cabang         = $this->cabang->find($id);

            $validateData   = $this->validateData('edit', $id);
            
            if($validateData->already){
                return $validateData->redirect;
            }
        }else{
            $type                   = 'Menambahkan';
            $cabang                 = $this->cabang;
            $cabang->id_cabang      = uniqid();

            $validateData           = $this->validateData('create');
            
            if($validateData->already){
                return $validateData->redirect;
            }

            // for input value 'modal_awal' to table 'saldo_cabang'
            $saldo_cabang = $this->saldo_cabang($cabang);
        }
       
        $cabang->investor       = request('investor');
        $cabang->no_cabang      = request('no_cabang');
        $cabang->nama_cabang    = request('nama_cabang');
        $cabang->telp_cabang    = request('telp_cabang');
        $cabang->alamat_cabang  = request('alamat_cabang');
        $cabang->save();

        // insert data to other table
        // condition when make new data branch
        if(!$id){
            $logSaldoCabang     = $this->log_saldo_cabang($cabang, $saldo_cabang, $type);
            $penambahanModal    = $this->penambahan_modal($cabang, $saldo_cabang, $type);
        }

        $message    = '<strong>Sukses!</strong> Data Cabang telah di '.$type.' dengan Nomor Cabang '.$cabang->no_cabang.
                      ' dan Nama Cabang '.$cabang->nama_cabang.' telah Berhasil';
        flash_message('message', $message);

        return $validateData->redirect;
    }

    public function saldo_cabang($cabang)
    {
        $saldo_cabang             = $this->saldo_cabang;
        $saldo_cabang->id_cabang  = $cabang->id_cabang;
        $saldo_cabang->total_saldo= remove_dot(request('modal_awal'));
        $saldo_cabang->save();

        return $saldo_cabang;
    }

    public function penambahan_modal($cabang, $saldo, $type)
    {
        if($type == 'Menambahkan'){
            $penambahanModal            = $this->penambahan_modal;
            $penambahanModal->jumlah    = $saldo->total_saldo;
            $penambahanModal->tanggal   = Carbon::now()->format('Y-m-d');
            $penambahanModal->id_cabang = $cabang->id_cabang;
            $penambahanModal->keterangan= "MODAL AWAL CABANG ".$cabang->no_cabang;
            $penambahanModal->save();
        }
    }

    public function log_saldo_cabang($cabang, $saldo, $type)
    {
        if($type == 'Menambahkan'){
            $logSaldoCabang                     = new Log_saldo_cabang;
            $logSaldoCabang->jenis              = 'debit';
            $logSaldoCabang->jumlah             = $saldo->total_saldo;
            $logSaldoCabang->id_cabang          = $cabang->id_cabang;
            $logSaldoCabang->keterangan         = "MODAL AWAL CABANG ".$cabang->no_cabang;
            $logSaldoCabang->tanggal_log_saldo  = Carbon::now()->format('Y-m-d');
            $logSaldoCabang->save();
        }
    }

    public function validateData($type, $id = null)
    {
        $message    = '<strong>Maaf!</strong> Data Cabang dengan Nomor Cabang '.request('no_cabang').' Sudah Tersedia';

        if($type == 'edit'){
            $findCabang = $this->cabang->find($id);

            if($findCabang->no_cabang != request('no_cabang')){
                flash_message('message', $message, 'danger');

                $already = true; 
            }else{
                $already = false;
            }

            $redirect    = redirect()->route('cabang.edit', $id);
        }elseif($type == 'create'){
            $findCabang = $this->cabang->where('no_cabang', request('no_cabang'))->first();

            if($findCabang){
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
