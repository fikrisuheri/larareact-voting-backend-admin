<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Pemilih;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function simpanpilihan(Request $request)
    {
        $token = $request->token;
        $kandidat_id = $request->kandidat_id;

        $pemilih = Pemilih::where(['token' => $token])->first();

        if($pemilih->status == 0 && $pemilih->kandidat_id == null){
            $pemilih->status = 1;
            $pemilih->kandidat_id = $kandidat_id;
            $pemilih->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan suara',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Token telah digunakan',
            ]);
        }
    }
}
