<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Biaya_titip;

use Terbilang;
use Carbon\Carbon;

class Akad extends Model
{
    protected $table        = "akad";
    public $timestamps      = false;
    protected $primaryKey   = 'id_akad';
    // protected $guarded   = [];
    // protected $dates = [
    //     'tanggal_akad',
    //     'tanggal_jatuh_tempo'
    // ];
    protected $fillable = [
        'id_cabang',
        'no_id',
        'key_nasabah',
        'nama_barang',
        'jenis_barang',
        'kelengkapan',
        'kekurangan',
        'jangka_waktu_akad',
        'tanggal_akad',
        'tanggal_jatuh_tempo',
        'nilai_tafsir',
        'nilai_pencairan',
        'bt_7_hari',
        'biaya_admin',
        'terbilang',
        'status',
    ];

    // for filter data between date variable start to variable $end field 'tanggal_jatuh_tempo'
    public function scopeFilterRange($query, $start, $end)
    {
        return $query->whereBetween('tanggal_jatuh_tempo', [$start->format('Y-m-d'), $end->format('Y-m-d')]);
    }

    // filter data base on 'jangka_waktu_akad' and then set interval previous date now
    // variable day for condition field 'jangka_waktu_akad'
    // variable interval for condition total day before 'tanggal jatuh tempo'
    public function scopeAddDay($query, $day, $interval)
    {
        $end    = Carbon::now()->addDays($interval)->format('Y-m-d');
        $start  = Carbon::now()->format('Y-m-d');

        return $query->where('jangka_waktu_akad', $day)
                     ->whereBetween('tanggal_jatuh_tempo', [$start, $end]);
    }

    public function scopeDetailJenisBarang($query, $data)
    {
        return $query->where('detail_jenis_barang', $data);
    }

    //start query status 'lunas, belum lunas, lelang dan refund'
    public function scopeBelumLunas($query)
    {
        return $query->whereStatus('Belum Lunas');
    }
    

    public function scopeLelang($query)
    {
        return $query->whereStatus('Lelang');
    }

    public function scopeLunas($query)
    {
        return $query->whereStatus('Lunas');
    }

    public function scopeRefund($query)
    {
        return $query->whereStatus('Refund');
    }
    //end query status 'lunas, belum lunas, lelang dan refund'

    //start query 'status lokasi kantor, proses, gudang'
    public function scopeStatusLokasi($query, $location = 'kantor')
    {
        return $query->where('status_lokasi', $location);
    }
    //end query 'status lokasi kantor, proses, gudang'

    public function scopeBaseBranch($query)
    {   
        // get data id_cabang from table 'user_cabang' base on this user
        $user_cabang    = User_cabang::baseUsername()->first();

        return $query->where('id_cabang', $user_cabang->id_cabang);
    }

    // for can fetch data nasabah use left join
    public function scopeJoinBiayaTitip($query)
    {
        return $query->rightJoin('bea_titip', 'akad.no_id', '=', 'bea_titip.no_id');
    }

    // for can fetch data nasabah use left join
    public function scopeJoinNasabah($query)
    {
        return $query->leftJoin('nasabah', 'akad.key_nasabah', '=', 'nasabah.key_nasabah');
    }

    public function scopeMaintenance($query)
    {
        $end    = Carbon::now()->subDays(15)->format('Y-m-d');
        $start  = Carbon::now()->subDays(30)->format('Y-m-d');

        $query->whereBetween('tanggal_akad', [$start, $end])
              ->where('jangka_waktu_akad', '!=', '7')
              ->where('jangka_waktu_akad', '!=', '1');
            //   ->where('maintenance', 0);

        return $query;
    }

    // search data by keyword form input
    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }

    public function scopeSorted($query, $by = 'akad.id_akad', $sort = 'asc')
    {
        return $query->orderBy($by, $sort);
    }

    public function scopeOpsiPembayaran($query, $data)
    {
        return $query->where('opsi_pembayaran', $data);
    }

    public function scopeJangkaWaktuAkad($query, $data)
    {
        return $query->where('jangka_waktu_akad', $data);
    }

    public function getNamaTargetLokasiAttribute()
    {
        return $this->target_lokasi == 'kantor' ? 'KANTOR' : 'GUDANG'; 
    }
    public function getNamaTargetLokasiKembaliAttribute()
    {
        if($this->target_lokasi == 'gudang'){
            return 'KANTOR';
        }else{
            return 'GUDANG';
        }
    }

    public function getNominalBiayaAdminAttribute()
    {
        return 'Rp '. nominal($this->biaya_admin);
    }

    public function getNominalBiayaTitipAttribute()
    {
        return 'Rp '. nominal($this->bt_7_hari);
    }

    public function getNominalNilaiTafsirAttribute()
    {
        return 'Rp '. nominal($this->nilai_tafsir);
    }

    public function getNominalTunggakanAttribute()
    {
        $biaya_titip = Biaya_titip::where('no_id', $this->no_id)->get();

        if(!$biaya_titip->isEmpty()){
            $total = Biaya_titip::
                where('no_id', $this->no_id)
                ->sum('pembayaran');

            $data = Biaya_titip::
                where('no_id', $this->no_id)
                // ->orderBy('tanggal_pembayaran')
                ->orderBy('tanggal_pembayaran', 'desc')
                ->first();

            $total_minggu = Carbon::parse($this->tanggal_akad)->diffInDays($data->tanggal_jatuh_tempo) / 7;
            $total_minggu = round($total_minggu);

            $data['tanggal_akad'] = $this->tanggal_akad;
            $data['tanggal_jatuh_tempo'] = $this->tanggal_jatuh_tempo;
            $data['total'] = $total;
            // 'jumlah minggu yang sudah di bayar'
            $data['minggu_sudah'] = $total / $this->bt_7_hari;
            // 'jumlah minggu yang belum dibayar'
            $data['minggu_tertunggak'] = $total_minggu - $data->minggu_sudah;
            $data['total_minggu'] = $total_minggu;
            // 'jumlah uang yang harus dibayar' 
            $data['nominal'] = $data->minggu_tertunggak * $this->bt_7_hari;
            $data['nominal'] = nominal($data->nominal);

            return 'Rp.'.$data->nominal.' ('.$data->minggu_tertunggak.' Periode)';
        }
    }
}
