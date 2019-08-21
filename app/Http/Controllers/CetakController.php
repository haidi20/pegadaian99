<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use Storage;
use Carbon\Carbon;
use setasign\Fpdi\Fpdi;

class CetakController extends Controller
{
    public function __construct(Request $request, Fpdi $pdf)
    {
        $this->pdf      = $pdf; 
        $this->request  = $request;
    }

    public function print()
    {
        $data       = [];
        $input 		= $this->request->except('_token');
        $url_pdf    = $input['url_pdf'];
        $input      = $input['data'];

        // 'langsung agar tidak mengatur array data lagi'
        if(request('type') == 'langsung'){            
            $data = $input;
            $data['marhun_bih'] = nominal($data['nilai_pencairan']);
            $data['taksiran_marhun'] = nominal($data['nilai_tafsir']);
            $data['nilai_opsi_pembayaran'] = $data['opsi_pembayaran'];
            // $data['biaya_titip'] = nominal($data['bt_7_hari']);
            $data['biaya_titip'] = $data['bt_7_hari'];
            // $data['biaya_admin'] = nominal($data['biaya_admin']);
            // $data['jml_bt_yang_dibayar'] = nominal($data['jml_bt_yang_dibayar']);
        }else{
            foreach ($input as $index => $item) {
                $data[$item['name']] = $item['value'];
            }

            $data['marhun_bih'] = nominal($data['marhun_bih']);

            session()->put('kekurangan_garis_baru', $data['kekurangan']);
            session()->put('kelengkapan_garis_baru', $data['kelengkapan']);
            $searches = array("\r", "\n", "\r\n");
            $data['kekurangan']     =   str_replace($searches, " ", $data['kekurangan']);
            $data['kelengkapan']    =   str_replace($searches, " ", $data['kelengkapan']);
        }

        $data['type']                   = request('type') ? request('type') : null;
        $data['tanggal_akad']           = Carbon::parse($data['tanggal_akad'])->format('d-m-Y');
        $data['tanggal_jatuh_tempo']    = Carbon::parse($data['tanggal_jatuh_tempo'])->format('d-m-Y');

        // return $data;

        return view('cetak.print', compact('data', 'url_pdf', 'input'));
    }

    public function pdf()
    {
        $data 		= $this->request->except('_token');

        $pdf = $this->pdf;
        $pdf->setAutoPageBreak(false);

        $pdf->AddPage('L');
        //Set the source PDF file
        // $pagecount = $pdf->setSourceFile('pdf/form-akad.pdf');
        $pagecount = $pdf->setSourceFile(storage_path('pdf/form-akad.pdf'));
        $tpl = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tpl);
        
        //Use this page as template
        $pdf->useTemplate($tpl, null, null, null, null, true);
        
        //Alamat cabang
        $pdf->SetX(105);
        $pdf->setY(28, false);
        //Select Arial italic 8
        $pdf->SetFont('Arial','B',9);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $this->infoCabang()->alamat_cabang.' Telp.'. $this->infoCabang()->telp_cabang, 0, 0, 'L');

        //NO ID
        $pdf->SetX(40);
        $pdf->setY(36, false);
        //Select Arial italic 8
        $pdf->SetFont('Arial','B',9);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['no_id'], 0, 0, 'L');

        //Nama
        $pdf->SetX(41);
        $pdf->setY(53, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['nama_lengkap'], 0, 0, 'L');

        //Kelamin Pria
        if($data['jenis_kelamin'] == 'Pria'){
            $pdf->SetX(41);
            $pdf->setY(59, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, 'X', 0, 0, 'L');
        }else{
            //Kelamin Wanita
            $pdf->SetX(74);
            $pdf->setY(59, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, 'X', 0, 0, 'L');
        }

        //Alamat
        $pdf->SetX(41);
        $pdf->setY(65, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['alamat'], 0, 0, 'L');

        //kota
        $pdf->SetX(41);
        $pdf->setY(77, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['kota'], 0, 0, 'L');

        //Telp
        $pdf->SetX(41);
        $pdf->setY(83, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['no_telp'], 0, 0, 'L');

        //KTP
        if($data['jenis_id'] == 'KTP'){
            $pdf->SetX(41);
            $pdf->setY(89, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, "X", 0, 0, 'L');
        }elseif($data['jenis_id'] == 'SIM'){
            //SIM
            $pdf->SetX(70);
            $pdf->setY(89, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, "X", 0, 0, 'L');
        }elseif($data['jenis_id'] == 'KK'){
            //KK
            $pdf->SetX(97);
            $pdf->setY(89, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, "X", 0, 0, 'L');
        }

        //no identitas
        $pdf->SetX(41);
        $pdf->setY(95, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['no_identitas'], 0, 0, 'L');

        //tgl lahir
        $pdf->SetX(41);
        $pdf->setY(101, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, Carbon::parse($data['tanggal_lahir'])->format('d-m-Y'), 0, 0, 'L');

        //Nama Barang
        $pdf->SetX(41);
        $pdf->setY(119, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['nama_barang'], 0, 0, 'L');

        //JENIS BARANG
        if($data['jenis_barang'] == 'elektronik'){
            //elektronik
            $pdf->SetX(41);
            $pdf->setY(125, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, "X", 0, 0, 'L');
        }else{
            //kendaraan
            $pdf->SetX(79);
            $pdf->setY(125, false);
            //Print centered cell with a text in it
            $pdf->Cell(0, 0, "X", 0, 0, 'L');
        }

        //kelengkapan
        $pdf->SetX(9);
        $pdf->setY(136, false);
        //Print centered cell with a text in it
        if(session()->has('kelengkapan_garis_baru')){
            $data['kelengkapan'] = session()->get('kelengkapan_garis_baru');
        }
        $pdf->MultiCell(0, 5, $data['kelengkapan']);

        //kekurangan
        $pdf->SetX(88);
        $pdf->setY(136, false);
        //Print centered cell with a text in it
        if(session()->has('kekurangan_garis_baru')){
            $data['kekurangan'] = session()->get('kekurangan_garis_baru');
        }
        $pdf->MultiCell(0, 5, $data['kekurangan']);

        //jangka waktu akad
        // if($data['jangka_waktu_akad'] == 30){
        //     //waktu akad 30 hari
        //     $pdf->SetX(170);
        //     $pdf->setY(44, false);
        //     //Print centered cell with a text in it
        //     $pdf->Cell(0, 0, "X", 0, 0, 'L');
        // }else{
        //     //waktu akad 60 hari
        //     $pdf->SetX(189);
        //     $pdf->setY(44, false);
        //     //Print centered cell with a text in it
        //     $pdf->Cell(0, 0, "X", 0, 0, 'L');
        // }

        //tanggal akad
        $pdf->SetX(231);
        $pdf->setY(45, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, Carbon::parse($data['tanggal_akad'])->format('d-m-Y'), 0, 0, 'L');

        //tempo akad
        $pdf->SetX(287);
        $pdf->setY(45, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, Carbon::parse($data['tanggal_jatuh_tempo'])->format('d-m-Y'), 0, 0, 'L');

        //taksir
        $pdf->SetX(41);
        $pdf->setY(180, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['taksiran_marhun'], 0, 0, 'L');

        //biaya titip
        $pdf->SetX(125);
        $pdf->setY(180, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['type'] == 'langsung' ? nominal($data['biaya_titip']) : $data['biaya_titip'], 0, 0, 'L');

        //marhun bih
        $pdf->SetX(41);
        $pdf->setY(186, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['marhun_bih'], 0, 0, 'L');

        //administrasi
        $pdf->SetX(125);
        $pdf->setY(186, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['type'] == 'langsung' ? nominal($data['biaya_admin']) : $data['biaya_admin'], 0, 0, 'L');

        //total b titip
        $pdf->SetX(41);
        $pdf->setY(192, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['type'] == 'langsung' ? nominal($data['jml_bt_yang_dibayar']) : $data['jml_bt_yang_dibayar'], 0, 0, 'L');

        //B adm Lelang
        $pdf->SetX(125);
        $pdf->setY(192, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, 'belum tau', 0, 0, 'L');

        //terbilang
        $pdf->SetX(36);
        $pdf->setY(198, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['terbilang'], 0, 0, 'L');

        //kuasa pemutus taksir
        $pdf->SetX(185);
        $pdf->setY(204, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, Auth::user()->username, 0, 0, 'L');

        //rahin
        $pdf->SetX(280);
        $pdf->setY(204, false);
        //Print centered cell with a text in it
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(0, 0, $data['nama_lengkap'], 0, 0, 'L');
        
        $pdf->Output("Surat-Akad-".$data['nama_lengkap']."-".$data['key_nasabah'].".pdf", "I");

        $pdf->Close();
    }
}
