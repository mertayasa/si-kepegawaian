<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class NewCutiDatatable{

    static public function set($cuti){
        return DataTables::of($cuti)
            ->editColumn('dari_tgl', function($cuti){
                return Carbon::parse($cuti->dari_tgl)->isoFormat('LL');
            })
            ->editColumn('sampai_tgl', function($cuti){
                return Carbon::parse($cuti->sampai_tgl)->isoFormat('LL');
            })
            ->editColumn('status', function($cuti){
                if($cuti->status == 0){
                    return '<span class="badge badge-warning">Belum Diterima</span>';
                }
                if($cuti->status == 1){
                    return '<span class="badge badge-primary">Diterima</span>';
                }
                if($cuti->status == 2){
                    return '<span class="badge badge-danger">Ditolak</span>';
                }
            })
            ->addColumn('action', function($cuti){
                if(userRole() == 'pegawai'){
                    if($cuti->status != 1){
                        $deleteUrl = "'".route('cuti.destroy', $cuti->id)."', 'cutiDatatable'";
                        return  '<div class="btn-group">'.
                            '<a href="'.route('cuti.edit',$cuti->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                            '<a href="#" onclick="deleteModel('.$deleteUrl.',)" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                        '</div>';
                    }else{
                        return '<button class="btn btn-primary btn-sm" style="pointer-events: none;"> <i class="menu-icon fa fa-check"></i> Diterima</button>';
                    }
                }

                $updateRoute1 = "'".route('cuti.updateStatus', [$cuti->id, 1])."', 'cutiDatatable'";
                $updateRoute2 = "'".route('cuti.updateStatus', [$cuti->id, 2])."', 'cutiDatatable'";
                return '<div class="btn-group">'.
                        '<a href="#" onclick="updateStatus('.$updateRoute1.', 1)" class="btn btn-primary btn-sm" ><i class="menu-icon fa fa-check"></i> Terima</a>
                        <a href="#" onclick="updateStatus('.$updateRoute2.', 2)" class="btn btn-danger btn-sm" ><i class="menu-icon fa fa-times"></i> Tolak</a>'.
                        '</div>';

            })->addIndexColumn()->rawColumns(['action', 'surat_ket', 'status'])->make(true);
    }

}
