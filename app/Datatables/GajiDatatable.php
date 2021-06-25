<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class GajiDatatable{

    static public function set($gaji){
        return Datatables::of($gaji)
            ->editColumn('gaji', function($gaji){
                return formatPrice($gaji->gaji);
            })
            ->addColumn('action', function($gaji){
                return  '<div class="btn-group">'.
                    '<a href="#" data-toggle="modal" data-target="#gajiModal" onclick="populateModal(this)" 
                        data-id="'.$gaji->id.'" 
                        data-gaji="'.$gaji->gaji.'" 
                        data-jabatan="'.$gaji->jabatan.'" 
                        data-golongan="'.$gaji->golongan.'" 
                        class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }

}
