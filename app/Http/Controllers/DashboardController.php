<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(userRole() == 'admin'){
            $data = $this->getDataAdmin();
            return view('dashboard.admin', compact('data'));
        }
        
        $data = $this->getDataAdmin();
        return view('dashboard.pegawai', compact('data'));
    }

    public function getDataAdmin(){
        $data = [];
        return $data;
    }

    public function getDataPegawai(){
        $data = [];
        return $data;
    }
}
