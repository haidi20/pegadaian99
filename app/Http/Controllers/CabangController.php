<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

class CabangController extends Controller
{
    public function index()
    {
    	return view('cabang.index');
    }

    public function create()
    {
    	return 'create';
    }
}
