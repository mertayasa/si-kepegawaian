<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahPegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.tambah');
    }

    public function simpan(Request $request){

        $this->_validation($request);

        DB::table('pegawai')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'umur' => $request->umur,
            'jk' => $request->jk,
            'foto' => $request->foto,
            'golongan' => $request->golongan,
        ]);


        return redirect()->route('pegawai')->with('message','Data berhasil disimpan!');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'foto' => 'required',
            'golongan' => 'required'
        ]

    );
    }
}
