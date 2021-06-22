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
                $deleteUrl = "'".route('sakit.destroy', $sakit->id)."', 'sakitDatatable'";
                return  '<div class="btn-group">'.
                    '<a href="'.route('sakit.edit',$sakit->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';
            })->addIndexColumn()->rawColumns(['action', 'surat_ket'])->make(true);
    }

}
