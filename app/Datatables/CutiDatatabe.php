<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class CutiDatatable{

    static public function set($cuti){
        return Datatables::of($cuti)
            ->editColumn('dari_tgl', function($cuti){
                return Carbon::parse($cuti->dari_tgl)->isoFormat('LL');
            })
            ->editColumn('sampai_tgl', function($cuti){
                return Carbon::parse($cuti->sampai_tgl)->isoFormat('LL');
            })
            ->addColumn('action', function($cuti){
                $deleteUrl = "'".route('cuti.destroy', $cuti->id)."', 'cutiDatatable'";
                return  '<div class="btn-group">'.
                    '<a href="'.route('cuti.edit',$cuti->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';
            })->addIndexColumn()->rawColumns(['action', 'surat_ket'])->make(true);
    }

}
