<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function print()
    {
        $data       = [];
        $input 		= $this->request->except('_token');
        $input      = $input['data'];
        
        foreach ($input as $index => $item) {
            $data[$item['name']] = $item['value'];
        }

        return view('cetak.print', compact('data'));
    }
}
