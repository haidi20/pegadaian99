<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Atk;

use Auth;
use Carbon\Carbon;

class OperasionalController extends Controller
{
    public function __construct(
                                Atk $atk,
                                Request $request
                            )
    {
        $this->atk      = $atk;
        $this->request  = $request;

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
    	$column = config('library.column.bku');

        return $this->template('operasional.bku', compact('column'));
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
        $column = config('library.column.hutang');

        return $this->template('operasional.hutang', compact('column'));
    }
}
