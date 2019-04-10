<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermodalanController extends Controller
{
    public function create()
    {
    	return 'tambah saldo';
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
