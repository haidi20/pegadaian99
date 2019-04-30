<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Atk;
use App\Models\Bku;
use App\Models\Hutang_kas;
use App\Models\Saldo_cabang;

use Auth;
use Carbon\Carbon;

class OperasionalController extends Controller
{
    public function __construct(
                                Atk $atk,
                                Bku $bku,
                                Request $request,
                                Hutang_kas $hutang_kas,
                                Saldo_cabang $saldo_cabang
                            )
    {
        $this->atk          = $atk;
        $this->bku          = $bku;
        $this->request      = $request;
        $this->hutang_kas   = $hutang_kas;
        $this->saldo_cabang = $saldo_cabang;

        view()->share([
            'menu'          => 'operasional',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function create()
    {
    	return $this->template('operasional.form', array());
    }

    public function store()
    {
        $input = $this->request->except('_token');
        // return $input;

        $atk = $this->atk;
        $atk->id_cabang     = $this->id_cabang();
        $atk->keterangan    = request('keterangan');
        $atk->jumlah_atk    = remove_dot(request('jumlah'));
        $atk->tanggal_atk   = Carbon::now()->format('Y-m-d');
        $atk->save();

        $message = '<strong>Sukses!</strong> Data Atk berhasil di tambah';
        flash_message('message', $message);

        return redirect()->route('operasional.create');
    }

    public function bku()
    {
        $bku = $this->bku->idCabang()->sorted();

        if(request('by')){
            $bku = $bku->search(request('by'), request('q'));
        }

        $bku = $bku->paginate(request('perpage', 10));

    	$column = config('library.column.bku');

        return $this->template('operasional.bku', compact('column', 'bku'));
    }

    public function pengeluaran()
    {
        $atk = $this->atk->sorted();

        if(request('by')){
            $atk = $atk->search(request('by'), request('q'));
        }

        $atk     = $atk->paginate(request('perpage', 10));

        $column = config('library.column.pengeluaran');

    	return $this->template('operasional.pengeluaran', compact('column', 'atk'));
    }

    public function hutang()
    {
        $hutang_kas = $this->hutang_kas->sorted();

        if(request('by')){
            $hutang_kas = $hutang_kas->search(request('by'), request('q'));
        }

        $hutang_kas     = $hutang_kas->paginate(request('perpage', 10));

        $column = config('library.column.hutang');

        $saldo_cabang = $this->saldo_cabang->idCabang()->first();

        return $this->template('operasional.hutang', compact('column', 'hutang_kas', 'saldo_cabang'));
    }

    public function hutang_store()
    {
        $input = $this->request->except('_token');
        // return $input;

        $hutang_kas                = $this->hutang_kas;
        $hutang_kas->id_cabang     = request('id_cabang');
        $hutang_kas->jumlah        = remove_dot(request('jumlah'));
        $hutang_kas->uraian        = request('keterangan');
        $hutang_kas->tanggal_hutang= Carbon::now()->format('Y-m-d');
        $hutang_kas->status_hutang = 'Belum Lunas';
        $hutang_kas->save();

        $message    = '<strong>Sukses!</strong> Data Hutang Cabang telah di tambah';
        flash_message('message', $message);

        return redirect()->route('operasional.hutang');
    }

    public function change_status($id)
    {
        $hutang_kas = $this->hutang_kas->find($id);
        $hutang_kas->status_hutang = "Lunas";
        $hutang_kas->save();

        $message    = '<strong>Sukses!</strong> Data Hutang Cabang telah di perbaharui';
        flash_message('message', $message);

        return redirect()->route('operasional.hutang');
    }
}
