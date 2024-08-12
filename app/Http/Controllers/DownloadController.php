<?php

namespace App\Http\Controllers;

use App\Models\pencatatan;
use Illuminate\Http\Request;
use PDF;

class DownloadController extends Controller
{
    public function downloadpdf(){

        $pencatatans = Pencatatan::all();

        $pdf = PDF::loadView('downloadPDF', compact('pencatatans'));

        return $pdf->download('Laporan-Harian-Tpi-Pasir.pdf');
    }
}
