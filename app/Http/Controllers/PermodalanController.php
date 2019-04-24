<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;

class PermodalanController extends Controller
{
    public function __construct(
                                Request $request
                            )
    {
        $this->request      = $request;

        view()->share([
            'menu'          => 'permodalan',
            'menuHeader'    => config('library.menu_header'),
        ]);
    }

    public function create()
    {
        $feature = 'Tambah Saldo';

    	return $this->template('permodalan.form', compact('feature'));
    }

    public function store()
    {
        $input = $this->request->except('_token');

        return $input;
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
