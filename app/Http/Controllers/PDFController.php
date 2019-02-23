<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use App\Aveugle;

class PDFController extends Controller
{
  

public function getPDF(){

     $aveugle = Aveugle::all();
     $pdf=PDF::loadView('pdf.customer',['aveugle'=>$aveugle]);
	 return $pdf->stream('customer.pdf');
}






public function download_PDF(){

     $aveugle = Aveugle::all();
     $pdf=PDF::loadView('pdf.customer',['aveugle'=>$aveugle]);
	 return $pdf->download('customer.pdf');
}


























  }
