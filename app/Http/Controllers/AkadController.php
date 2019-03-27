<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkadController extends Controller
{
    public function __construct(
                                Request $request
                            )
    {
        $this->request          = $request;
    }

    public function index()
    {
    	return view('akad.index');
    }

    public function create()
    {
    	return $this->form();
    }

    public function form($id = null)
    {
    	return view('akad.form');
    }
}
