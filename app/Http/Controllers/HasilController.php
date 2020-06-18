<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Hasil Evoting'
        ];
        return view('hasil.index',$data);
    }

    public function ajaxGetHasil()
    {
        $hasil = DB::table('pemilih')
        ->select(DB::raw('COUNT(pemilih.kandidat_id) as jumlah'),'kandidat.name')
        ->join('kandidat','kandidat.id','=','pemilih.kandidat_id','RIGHT')
        ->groupBy('kandidat.id')
        ->get();

        echo json_encode($hasil);
    }

    public function ajaxGetAllAkun()
    {
        $hasil = DB::table('pemilih')
        ->select(DB::raw('COUNT(pemilih.id) as jumlah'))
        ->first();
        echo json_encode($hasil);
    }

    public function ajaxGetAkunSudahVoting()
    {
        $hasil = DB::table('pemilih')
        ->select(DB::raw('COUNT(id) as jumlah'))
        ->where(['status' => 1])
        ->whereNotNull('kandidat_id')
        ->first();
        echo json_encode($hasil);
    }

    public function ajaxGetAkunBelumVoting()
    {
        $hasil = DB::table('pemilih')
        ->select(DB::raw('COUNT(id) as jumlah'))
        ->where(['status' => 0])
        ->whereNull('kandidat_id')
        ->first();
        echo json_encode($hasil);
    }
}
