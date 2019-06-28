<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Cabang;
use App\Models\Kas_cabang;
use App\Models\User_cabang;
use App\Models\Saldo_cabang;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function template($file, $variable)
    {
    	$infoCabang = $this->infoCabang();
    	$variable['infoCabang'] = (object) $infoCabang;

    	return view($file, (array) $variable);
    }

    // FYI important => auth::user()->username not working in __construct()
    public function infoCabang()
    {
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();
        if($user_cabang){
            // get data cabang from table 'user_cabang' base on this user
            $cabang         = Cabang::find($user_cabang->id_cabang);
            $nomorCabang    = $cabang ? $cabang->no_cabang : 0;
            // and then get total 'kas cabang' base on id_cabang
            $saldo_cabang   = Saldo_cabang::baseBranch()->first();
            $kas_cabang     = Kas_cabang::baseBranch()->first();
            $total_kas      = $saldo_cabang ? $saldo_cabang->total_saldo : 0;
            $total_kas_admin= $kas_cabang ? $kas_cabang->total_kas : 0;
            // for condition 'akad baru' if saldo not enough  
            $total_kas_rumus= $total_kas;
             
            // 'total kas' base on cabang
            $total_kas      = nominal($total_kas);
            $total_kas_admin= nominal($total_kas_admin);
            $telp_cabang    = $cabang->telp_cabang;   
            $alamat_cabang  = $cabang->alamat_cabang;
            
        }else{
            $total_kas      = 'Tidak Ditemukan';
            $total_kas_admin= 'Tidak Ditemukan';
            $nomorCabang    = 'Tidak Ditemukan';
            $telp_cabang    = '';
            $alamat_cabang  = '';
            // for condition 'akad baru' if saldo not enough
            $total_kas_rumus= 0;
        }

        return (object) compact(
            'total_kas', 'total_kas_admin', 'nomorCabang', 'total_kas_rumus', 'alamat_cabang',
            'telp_cabang'
        );
    }

    // get data id_cabang from table 'user_cabang' base on this user
    public function id_cabang()
    {
        return User_cabang::baseUsername()->value('id_cabang');
    }


}
