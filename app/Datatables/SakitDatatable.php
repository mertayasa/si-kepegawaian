<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class SakitDatatable{

    static public function set($sakit){
        return Datatables::of($sakit)
            ->editColumn('surat_ket', function($sakit){
                return '<img src="'.asset('images/'.$sakit->surat_ket).'" alt="" width="100px">';
            })
            ->addColumn('action', function($sakit){
                // if(userRole() == 'pegawai'){
                    $hide_admin = userRole() == 'admin' ? 'd-none' : '';
                    $deleteUrl = "'".route('sakit.destroy', $sakit->id)."', 'sakitDatatable'";
                    return  '<div class="btn-group">'.
                        '<a href="'.asset('images/'.$sakit->surat_ket).'" target="_blank" class="btn btn-primary" ><i class="menu-icon fa fa-eye"></i> </a>'.
                        '<a href="'.route('sakit.edit',$sakit->id).'" class="btn btn-warning '. $hide_admin .'" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                        '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger '. $hide_admin .'" ><i class="menu-icon fa fa-trash"></i></a>'.
                    '</div>';
                // }
            })->addIndexColumn()->rawColumns(['action', 'surat_ket'])->make(true);
    }

}
