<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bazooka;

class APIController extends Controller
{
    public function searchsenjata(Request $request)
    {
        $cari = $request->input('q');

        $bazooka = bazooka::where('nama_senjata', 'LIKE', "%$cari%")->get();

        if($bazooka->isEMpty())
        {
            return response()->json([
                'success' => false,
                'data' => 'data tidak ditemukan'
            ], 400)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        else 
        {
            return response()->json([
                'success' => true,
                'data' => $bazooka
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
    }
}
