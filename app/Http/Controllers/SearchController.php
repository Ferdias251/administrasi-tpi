<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencatatan;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $nik = $request->input('nik');

        $pencatatan = Pencatatan::where('nik', $nik)->orderBy('created_at', 'asc')->get();

        if ($pencatatan->isNotEmpty()) {
            return response()->json(['success' => true, 'results' => $pencatatan]);
        } else {
            return response()->json(['success' => false, 'message' => 'Data Tidak Di Temukan!']);
        }
    }
}
