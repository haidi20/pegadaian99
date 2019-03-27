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
    	$akad = $this->akad->nasabah()->orderBy('id_akad')->paginate(10);

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
    	if($id){
    		$action = route('akad.update', $id);
            $method = 'PUT';
    	}else{
    		$action = route('akad.store');
            $method = 'POST';
    	}

    	return view('akad.form', compact('action', 'method'));
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
    	$input = $this->request->except('_token');


    }

    public function destroy($id)
    {

    }

}
