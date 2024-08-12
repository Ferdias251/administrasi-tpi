<?php

namespace App\Http\Controllers;

use App\Models\pencatatan;
use Illuminate\Http\Request;
use App\Models\StockIkan;
use Illuminate\Support\Facades\DB;

class StockIkanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel stock_ikan
        $totalJumlahIkanPerJenis = Pencatatan::select('ikans.id as ikan_id', 'ikans.nama_ikan', DB::raw('SUM(pencatatans.jumlah_ikan) as total_jumlah_ikan'))
                                    ->join('ikans', 'ikans.id', '=', 'pencatatans.ikan_masuk')
                                    ->groupBy('ikans.id', 'ikans.nama_ikan')
                                    ->get();

        
        // Mengirim data ke view
        return view('welcome', compact('totalJumlahIkanPerJenis'));
    }
}
