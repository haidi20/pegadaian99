<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'ini index post';
    }

    public function store(Request $request)
    {
        if(request()->hasFile('image')){
            $files = request()->file('image');
            // @unlink(public_path('storages/' . request('image')->getClientOriginalName));
            $extension      = $files->getClientOriginalExtension();
            $fileName       = str_random(8) . '.' . $extension;
            $files->move("storages/", $fileName);
            $data = '/storages/'.$fileName;

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ], 200);
        }else{

            return 'tidak ada file gambar';
        }

    }
}
