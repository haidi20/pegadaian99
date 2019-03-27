<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Akad;

class AkadController extends Controller
{
    public function __construct(
    							Akad $akad,
                                Request $request
                            )
    {
    	$this->akad 	= $akad;
        $this->request  = $request;
    }

    public function index()
    {
    	$akad = $this->akad->paginate(10);

    	return view('akad.index', compact('akad'));
    }

    public function create()
    {
    	return $this->form();
    }

    public function edit($id)
    {
    	return $this->form($id);
    }

    public function form($id = null)
    {
    	return view('akad.form');
    }

    public function store()
    {
    	return $this->save();
    }

    public function update($id)
    {
    	return $this->save($id);
    }

    public function save($id = null)
    {

    }

    public function destroy($id)
    {

    }

}
