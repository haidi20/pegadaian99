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
}
