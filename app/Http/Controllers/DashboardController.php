<?php

namespace App\Http\Controllers;

use App\Model\Cuti;
use App\Model\Sakit;
use App\Model\Sanksi;
use App\Model\Surat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(userRole() == 'admin'){
            $data = $this->getDataAdmin();
            return view('dashboard.admin', compact('data'));
        }
        
        $data = $this->getDataPegawai();
        return view('dashboard.pegawai', compact('data'));
    }

    public function getDataAdmin(){
        $pegawai_count = User::where('level', 1)->count();
        $surat_count = Surat::count();
        $sanksi_count = Sanksi::count();
        $cuti_count = 0;

        $cuti = Cuti::where('status', 1)->get();
        foreach($cuti as $cuti){
            $cuti_count = $cuti_count + $cuti->total_hari;
        }

        $data = [
            'pegawai' => $pegawai_count,
            'surat' => $surat_count,
            'sanksi' => $sanksi_count,
            'cuti' => $cuti_count,
        ];

        // dd($data);

        return $data;
    }

    public function getDataPegawai(){
        $sanksi_count = Sanksi::where('pegawai_nip', Auth::user()->pegawai->nip)->count();
        $sakit_count = Sakit::where('pegawai_nip', Auth::user()->pegawai->nip)->count();
        $cuti_count = 0;

        $cuti = Cuti::where('status', 1)->where('pegawai_nip', Auth::user()->pegawai->nip)->get();

        foreach($cuti as $cuti){
            $cuti_count = $cuti_count + $cuti->total_hari;
        }

        $data = [
            'sanksi' => $sanksi_count,
            'cuti' => $cuti_count,
            'sakit' => $sakit_count,
        ];

        return $data;
    }
}
