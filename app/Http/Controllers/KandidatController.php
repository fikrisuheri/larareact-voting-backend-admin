<?php

namespace App\Http\Controllers;

use App\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kandidat',
            'kandidat' => Kandidat::all()
        ];

        return view('kandidat.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kandidat'
        ];

        return view('kandidat.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'avatar' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('kandidat.tambah')->withErrors($validator)->withInput();
        } else {

            $file = $request->file('avatar')->store('avatar', 'public');
            Kandidat::create([
                'name' => $request->name,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'avatar' => $file
            ]);
            return redirect()->route('kandidat')->with('status', 'Berhasil Menambah Kandidat');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Tambah Kandidat',
            'kandidat' => Kandidat::find($id)
        ];

        return view('kandidat.edit', $data);
    }

    public function hapus($id)
    {
        $kandidat = Kandidat::find($id);
        Storage::disk('public')->delete($kandidat->avatar);
        $kandidat->delete();
        
        return redirect()->route('kandidat')->with('status', 'Berhasil Menghapus Kandidat');
    }

    public function ubah($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'avatar' => 'mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('kandidat.tambah')->withErrors($validator)->withInput();
        } else {

            if ($request->file('avatar')) {
                Storage::disk('public')->delete($kandidat->avatar);
                $file = $request->file('avatar')->store('avatar', 'public');
                $kandidat = Kandidat::find($id);
                $kandidat->name = $request->name;
                $kandidat->visi = $request->visi;
                $kandidat->misi = $request->misi;
                $kandidat->avatar = $file;
                $kandidat->save();

                return redirect()->route('kandidat')->with('status', 'Berhasil Mengubah Kandidat');
            } else {
                $kandidat = Kandidat::find($id);
                $kandidat->name = $request->name;
                $kandidat->visi = $request->visi;
                $kandidat->misi = $request->misi;
                $kandidat->save();

                return redirect()->route('kandidat')->with('status', 'Berhasil Mengubah Kandidat');
            }
        }
    }
}
