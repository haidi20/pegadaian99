<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    public function create()
    {
    	return 'tambah data';
    }

    public function bku()
    {
    	return 'BKU Admin';
    }

    public function pengeluaran()
    {
    	return 'Data Pengeluaran';
    }

    public function hutang()
    {
    	return 'Hutang dan Pembayaran';
    }
}
