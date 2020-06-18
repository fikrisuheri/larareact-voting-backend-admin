<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::all();
        return response()->json([
            'status' => 'success',
            'results' => $kandidat,
            'message' => 'Sukses Login'
        ]);
    }
}
