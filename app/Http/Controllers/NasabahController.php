<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nasabah;

class NasabahController extends Controller
{
    public function __construct(
                                Nasabah $nasabah,
                                Request $request
                               )
    {
        $this->nasabah          = $nasabah;
        $this->request          = $request;

        view()->share([
            'menu'          => 'nasabah',
            'menu_header'   => config('library.menu_header'),
        ]);
    }

    public function index()
    {
    	$menu 		= 'database';
        $nasabah 	= $this->nasabah->sorted();
        $column		= config('library.column.nasabah');

        if(request('by')){
            $nasabah   = $nasabah->search(request('by'), request('q'));
        }

        $nasabah 	 = $nasabah->paginate(request('perpage', 10));

    	return view('nasabah.index', compact('nasabah', 'column', 'menu'));
    }
}
