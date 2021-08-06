<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PegawaiDatatable{

    static public function set($pegawai){
        return Datatables::of($pegawai)
            ->editColumn('foto', function($pegawai){
                return '<img src="'.asset('images/'.$pegawai->foto).'" alt="" width="100px">';
            })
            ->editColumn('jk', function($pegawai){
                return getGender($pegawai->jk);
            })
            // ->editColumn('jabatan', function($pegawai){
            //     return getJabatan($pegawai->golongan);
            // })
            ->addColumn('action', function($pegawai){
                $deleteUrl = "'".route('pegawai.hapus', $pegawai->id)."', 'pegawaiDatatable'";
                return  '<div class="btn-group">'.
                    '<a href="'.route('pegawai.edit',$pegawai->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }

}
