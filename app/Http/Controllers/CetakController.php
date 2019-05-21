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
        $input      = $input['data'];
        
        foreach ($input as $index => $item) {
            $data[$item['name']] = $item['value'];
        }

        return view('cetak.print', compact('data'));
    }

    public function pdf()
    {
        $data       = [];
        $input 		= $this->request->except('_token');
        $input      = $input['data'];
        
        foreach ($input as $index => $item) {
            $data[$item['name']] = $item['value'];
        }

        // return $data;

        $pdf = $this->pdf;
        $pdf->setAutoPageBreak(false);

        $pdf->AddPage('L');
        //Set the source PDF file
        $pagecount = $pdf->setSourceFile('pdf/form-akad.pdf');
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
        return $pdf->output('coba.pdf', 'I');
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
        $pdf->MultiCell(0, 5, $data['kelengkapan']);

        //kekurangan
        $pdf->SetX(88);
        $pdf->setY(136, false);
        //Print centered cell with a text in it
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
        // $pdf->Cell(0, 0, nominal($data['nilai_tafsir']), 0, 0, 'L');

        //biaya titip
        $pdf->SetX(125);
        $pdf->setY(180, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['biaya_titip'], 0, 0, 'L');

        //marhun bih
        $pdf->SetX(41);
        $pdf->setY(186, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['marhun_bih'], 0, 0, 'L');

        //administrasi
        $pdf->SetX(125);
        $pdf->setY(186, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['biaya_admin'], 0, 0, 'L');

        //total b titip
        $pdf->SetX(41);
        $pdf->setY(192, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['jml_bt_yang_dibayar'], 0, 0, 'L');

        //B adm Lelang
        $pdf->SetX(125);
        $pdf->setY(192, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['biaya_admin'], 0, 0, 'L');

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
        $pdf->SetX(282);
        $pdf->setY(204, false);
        //Print centered cell with a text in it
        $pdf->Cell(0, 0, $data['nama_lengkap'], 0, 0, 'L');
        
        $pdf->Output("Surat-Akad-".$data['nama_lengkap']."-".$data['key_nasabah'].".pdf", "I");
        $pdf->Close();
    }
}
