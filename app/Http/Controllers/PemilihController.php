<?php

namespace App\Http\Controllers;

use App\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemilihController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Akun Voting',
            'akuns' => Pemilih::all()
        ];
        return view('pemilih.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Akun Evoting'
        ];
        return view('pemilih.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->route('pemilih.tambah')->withErrors($validator)->withInput();
        } else {
            $objek = [];
            for ($x = 0; $x < $request->jumlah; $x++) {
                $karakter = '!*ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
                $string = '';
                for ($i = 0; $i < 6; $i++) {
                    $pos = rand(0, strlen($karakter) - 1);
                    $string .= $karakter{$pos};
                }
                Pemilih::create([
                    'status' => 0,
                    'token' => $string
                ]);
            }
            return redirect()->route('pemilih')->with('status','Berhasil Membuat Akun Voting');
        }
    }

    public function hapus()
    {
        Pemilih::truncate();
        return redirect()->route('pemilih')->with('status','Berhasil Menghapus Akun Voting');
    }
}
