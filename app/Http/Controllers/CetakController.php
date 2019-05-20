<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use setasign\Fpdi\Fpdi;

use Storage;

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

        return $data;

        // $pdf = $this->pdf;
        // $pdf->setAutoPageBreak(false);

        // $pdf->AddPage('L');
        // //Set the source PDF file
        // $pagecount = $pdf->setSourceFile('pdf/form-akad.pdf');
        // $tpl = $pdf->importPage(1);
        // $size = $pdf->getTemplateSize($tpl);
        
        // //Use this page as template
        // $pdf->useTemplate($tpl, null, null, null, null, true);
        
        // //Alamat cabang
        // $pdf->SetX(105);
        // $pdf->setY(28, false);
        // //Select Arial italic 8
        // $pdf->SetFont('Arial','B',9);
        // //Print centered cell with a text in it
        // $pdf->Cell(0, 0, 'alamat cabang', 0, 0, 'L');

        // $pdf->Output("surat akad.pdf", "I"); 
        // $pdf->Close();
    }
}
