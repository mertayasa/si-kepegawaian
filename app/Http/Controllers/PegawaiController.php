<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    // tampilkan data pegawai
    public function index(){
        $pegawai = DB::table('pegawai')->get();
        return view('pegawai.view', compact('pegawai'));
    }

    public function delete($id){
        DB::table('pegawai')->where('id', $id)->delete();
        return redirect()->route('pegawai')->with('message1','Data berhasil dihapus!');
    }

    // methode untuk edit
    public function edit($id){
        $pegawai = DB::table('pegawai')->where('id',$id)->first();
        return view('pegawai.edit',['pegawai' => $pegawai]);
    }

    //metode update
    public function update(Request $request,$id){
        DB::table('pegawai')->where('id',$id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'umur' => $request->umur,
            'jk' => $request->jk,
            'foto' => $request->foto,
            'golongan' => $request->golongan
        ]);
        return redirect()->route('pegawai')->with('message2','Data berhasil diedit!');
    }

}
