<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;

use Auth;
use Carbon\Carbon;

class OperasionalController extends Controller
{
    public function __construct(
                                Cabang $cabang,
                                Request $request,
                                Kas_cabang $kas_cabang,
                                User_cabang $user_cabang
                            )
    {
        $this->cabang       = $cabang;
        $this->request      = $request;
        $this->kas_cabang   = $kas_cabang;
        $this->user_cabang  = $user_cabang;

        view()->share([
            'menu'          => 'operasional',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function create()
    {
    	return $this->template('operasional.form', array());
    }

    public function bku()
    {
    	$column = config('library.column.bku');

        return $this->template('operasional.bku', compact('column'));
    }

    public function pengeluaran()
    {
        $column = config('library.column.pengeluaran');

    	return $this->template('operasional.pengeluaran', compact('column'));
    }

    public function hutang()
    {
        $column = config('library.column.hutang');

        return $this->template('operasional.hutang', compact('column'));
    }
}
