<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Pemilih;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->token;

        $findToken = Pemilih::where(['token' => $token]);

        if ($findToken->count() > 0) {
            $data = $findToken->first();
            if ($data->status == 1 && $data->kandidat_id != null) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Token Telah Digunakan'
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'results' => $findToken->first(),
                    'message' => 'Sukses Login'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Token Tidak Ditemukan'
            ]);
        }
    }
}
