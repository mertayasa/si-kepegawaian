<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class SanksiDatatable{

    static public function set($sanksi){
        return Datatables::of($sanksi)
            ->editColumn('surat_ket', function($sanksi){
                return '<img src="'.asset('images/'.$sanksi->surat_ket).'" alt="" width="100px">';
            })
            ->addColumn('action', function($sanksi){
                if(userRole() == 'pegawai'){
                    $deleteUrl = "'".route('sanksi.destroy', $sanksi->id)."', 'sanksiDatatable'";
                    return  '<div class="btn-group">'.
                        '<a href="'.route('sanksi.edit',$sanksi->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                        '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                    '</div>';
                }

                return '<a href="'.route('sanksi.updateStatus',$sanksi->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-check"></i></a>';
            })->addIndexColumn()->rawColumns(['action', 'surat_ket'])->make(true);
    }

}
