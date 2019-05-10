<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Cabang;
use App\Models\User_cabang;

class UserController extends Controller
{
    public function __construct(
    							User $user,
    							Cabang $cabang,
                                Request $request,
                                User_cabang $user_cabang
                            )
    {
        $this->user        = $user;
        $this->cabang      = $cabang;
        $this->request     = $request;
        $this->user_cabang = $user_cabang;

        view()->share([
            'menu'         => 'setting',
            'menuHeader'   => config('library.menu_header')
        ]);
    }

    public function index()
    {
       return $this->getLatLong(request()->ip());

    	$user = $this->user->get();

    	// proccess get value 'nomor cabang'
    	foreach ($user as $index => $item) {
    		$id_cabang 	= $this->user_cabang->where('username', $item->username)->value('id_cabang');
    		
    		$cabang[$item->id_user] 	= $this->cabang->where('id_cabang', $id_cabang)->value('no_cabang');
    	}

    	return $this->template('user.index', compact('user', 'cabang'));
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
        $finduser = $this->user->find($id);

        if($finduser){
            session()->flashInput($finduser->toArray());
            $action = route('user.update', $id);
            $method = 'PUT';
        }else{
            $action = route('user.store');
            $method = 'POST';
        }

    	return  $this->template('user.form', compact('action', 'method'));
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
        // return $input;
        if($id){
        	$type   = 'perbaharui';
            $user 	= $this->user->find($id);
        }else{
        	$type   = 'tambah';
            $user   = $this->user;
        }
       
        $user->username = request('username');
        $user->password = bcrypt(request('password'));
        $user->level 	= request('level');
        $user->save();

        $message    = '<strong>Sukses!</strong> Data Pengguna telah di '.$type;
        flash_message('message', $message);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
    	$user 	= $this->user->find($id);
    	$user->delete();

    	return redirect()->back();
    }

    // function to get  the address
    public function getLatLong($address){
        if(!empty($address)){
            //Formatted address
            $formattedAddr = str_replace(' ','+',$address);
            //Send request and receive json data by address
            $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
            $output = json_decode($geocodeFromAddr);
            //Get latitude and longitute from json data
            $data['latitude']  = $output->results[0]->geometry->location->lat; 
            $data['longitude'] = $output->results[0]->geometry->location->lng;
            //Return latitude and longitude of the given address
            if(!empty($data)){
                return $data;
            }else{
                return false;
            }
        }else{
            return false;   
        }
    }
}
