<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class SuratDatatable{

    static public function set($surat){
        return Datatables::of($surat)
            ->editColumn('foto', function($surat){
                return '<img src="'.asset('images/'.$surat->foto).'" alt="" width="100px">';
            })
            ->addColumn('action', function($surat){
                $deleteUrl = "'".route('surat.destroy', $surat->id)."', 'suratDatatable'";
                return  '<div class="btn-group">'.
                    '<a href="'.route('surat.edit',$surat->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }

}
