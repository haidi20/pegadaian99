<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;

use Auth;
use Carbon\Carbon;

class PermodalanController extends Controller
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
            'menu'          => 'permodalan',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function create()
    {
    	return $this->template('permodalan.form', array());
    }

    public function store()
    {
        $input = $this->request->except('_token');

        return $input;
    }

    public function penambahan()
    {
    	return 'list penambahan saldo';
    }

    public function refund()
    {
    	return 'refund saldo';
    }

    public function list_refund()
    {
    	return 'list data refund saldo';
    }

    public function hutang()
    {
    	return 'hutang dan piutang';
    }
}
