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

    public function biaya_titip()
    {
        return $this->hasMany('App\Models\Biaya_titip', 'no_id', 'no_id');
    }

    // for filter data between date variable start to variable $end field 'tanggal_jatuh_tempo'
    public function scopeFilterRange($query, $start, $end)
    {
        return $query->whereBetween('tanggal_akad', [$start->format('Y-m-d'), $end->format('Y-m-d')]);
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

    public function scopeBaseStatusAkad($query, $type)
    {
        return $query->where('status_akad', $type);
    }

    public function scopeJangkaWaktuAkad($query, $data)
    {
        return $query->where('jangka_waktu_akad', $data);
    }

    // for can fetch data nasabah use left join
    public function scopeJoinBiayaTitip($query)
    {
        return $query->rightJoin('bea_titip', 'akad.no_id', '=', 'bea_titip.no_id');
    }

    // for can fetch data nasabah use left join
    // status between 'bersangkutan' and 'wali'
    public function scopeJoinNasabah($query, $status = 'bersangkutan')
    {
        return $query->leftJoin('nasabah', 'akad.key_nasabah', '=', 'nasabah.key_nasabah')
                     ->where('nasabah.status_nasabah', $status);
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

    public function scopeOpsiPembayaran($query, $data)
    {
        return $query->where('opsi_pembayaran', $data);
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

    public function getFormatTanggalAkadAttribute()
    {
        return Carbon::parse($this->tanggal_akad)->format('d-m-Y');
    }

    public function getFormatTanggalJatuhTempoAttribute()
    {
        return Carbon::parse($this->tanggal_jatuh_tempo)->format('d-m-Y');
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
        return 'Rp. '.nominal($this->biaya_admin);
    }

    public function getNominalBiayaTitipAttribute()
    {
        return 'Rp. '.nominal($this->bt_7_hari);
    }

    public function getNominalNilaiTafsirAttribute()
    {
        return 'Rp. '.nominal($this->nilai_tafsir);
    }

    public function getNominalNilaiPencairanAttribute()
    {
        return 'Rp. '.nominal($this->nilai_pencairan);
    }

    public function getStatusMaintenanceAttribute()
    {
        return $this->maintenance == 0 ? 'Belum Diperiksa' : 'Sudah Diperiksa';
    }

    public function getDataTunggakanAttribute()
    {
        $biaya_titip = Biaya_titip::where('no_id', $this->no_id)->get();

        if(!$biaya_titip->isEmpty()){
            $totalTerbayar = Biaya_titip::
                where('no_id', $this->no_id)
                ->sum('pembayaran');

            $data = Biaya_titip::
                where('no_id', $this->no_id)
                // ->orderBy('tanggal_pembayaran')
                ->orderBy('tanggal_pembayaran', 'desc')
                ->first();

            $tanggal_sekarang = Carbon::now()->format('Y-m-d');
            
            // JANGAN DI HAPUS
            if($tanggal_sekarang < $this->tanggal_jatuh_tempo){
                $batas_waktu = $tanggal_sekarang;
            }elseif($tanggal_sekarang >= $this->tanggal_jatuh_tempo){
                $batas_waktu = $this->tanggal_jatuh_tempo;
            }

            // $batas_waktu = $this->tanggal_jatuh_tempo;
            // $batas_waktu = $tanggal_sekarang;

            $opsi_pembayaran = $this->opsi_pembayaran;

            $jarak_waktu = Carbon::parse($this->tanggal_akad)->diffInDays($batas_waktu) / $opsi_pembayaran;
            
            //condition 'harian' or 'mingguan'
            if($this->opsi_pembayaran == 1){
                $jarak_waktu = ceil($jarak_waktu) + 1;
                $keterangan  = 'Hari';
            }else{
                $jarak_waktu = ceil($jarak_waktu);
                $keterangan  = 'periode';
            }

            $tanggal_jatuh_tempo = $this->tanggal_jatuh_tempo;
            // 'jumlah minggu / hari yang sudah di bayar'
            $waktu_sudah = $totalTerbayar / $this->bt_7_hari;
            $waktu_sudah = floor($waktu_sudah);
            // 'jumlah minggu / hari yang belum dibayar'
            // $waktu_tertunggak = $jarak_waktu == 0 ? 0 : $waktu_sudah - $jarak_waktu;    
            $waktu_tertunggak = $jarak_waktu == 0 ? 0 : $this->compare_time($jarak_waktu, $waktu_sudah);    
            // 'jumlah uang yang harus dibayar' 
            $nominal = $waktu_tertunggak * $this->bt_7_hari;
            // 'mendapatkan angka tunggakan seblum kasih format nominal'
            $nominalBiasa = $nominal; 
            $nominal  = nominal($nominal);

            if($waktu_tertunggak == 0){
                $info   = 'Rp. 0 (0 '.$keterangan.')';
                
                // '1 di anggap lunas'
                $status_tunggakan = 1;
            }else{
                $info   = 'Rp. '.$nominal.' ('.$waktu_tertunggak.' '.$keterangan.')';
                
                // '0 di anggap belum lunas'
                $status_tunggakan = 0;
            }

            // $info = $jarak_waktu;
            $jatuhTempo = $tanggal_jatuh_tempo == $tanggal_sekarang ? $nominalBiasa : 0;

            //rewrite data
            $totalTerbayar      = nominal($totalTerbayar);

            return (object) compact(
                'info', 'nominal', 'jatuhTempo', 'totalTerbayar', 'jarak_waktu',
                'waktu_sudah', 'waktu_tertunggak', 'nominalBiasa', 'status_tunggakan', 
                'batas_waktu'
            );
        }else{
            $keterangan = $this->opsi_pembayaran == 1 ? 'harian' : 'periode';

            $info               = 'Rp. 0 (0 '.$keterangan.')';
            $nominal            = 0;
            $jatuhTempo         = 0;
            $waktu_sudah        = 0;
            $totalTerbayar      = 0;
            $nominalBiasa       = 0;
            $status_tunggakan   = 0; 
            $waktu_tertunggak   = 0;

            return (object) compact(
                'info', 'nominal', 'jatuhTempo', 'totalTerbayar',
                'waktu_sudah', 'waktu_tertunggak', 'nominalBiasa', 'status_tunggakan'
            );
        }
    }

    //'JANGAN DI HAPUS'
    public function compare_time($jarak_waktu, $waktu_sudah)
    {
        if($jarak_waktu > $waktu_sudah){
            $total = $jarak_waktu - $waktu_sudah;
            $total = nominal($total);
            return $total;
        }elseif($jarak_waktu < $waktu_sudah){
            // $total = $waktu_sudah - $jarak_waktu;
            // $total = nominal($total);
            // return $total;
            return 0;
        }else{
            return $waktu_sudah;
        }
    }
}
