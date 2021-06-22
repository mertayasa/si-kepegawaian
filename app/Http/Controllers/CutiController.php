<?php

namespace App\Http\Controllers;

use App\DataTables\CutiDatatable;
use App\Model\Cuti;
use App\Repositories\CutiRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CutiController extends Controller
{
    protected $cutiRepo;

    public function __construct(CutiRepository $cutiRepo){
        $this->cutiRepo = $cutiRepo;
    }
    
    public function index(){
        return view('cuti.index');
    }

    public function datatable(){
        if(userRole() == 'admin'){
            $cuti = $this->cutiRepo->getAllData();
        }else{
            $cuti = $this->cutiRepo->getAllData()->where('pegawai_id', Auth::user()->pegawai->id);
        }

        return CutiDatatable::set($cuti);
    }

    public function create(){
        return view('cuti.create');
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            $data['pegawai_id'] = Auth::user()->pegawai->id;

            $this->cutiRepo->store($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data cuti');
        }

        return redirect()->route('cuti.index')->with('success','Data cuti berhasil disimpan!');
    }

    public function show(Cuti $cuti){
        //
    }

    public function edit(Cuti $cuti){
        return view('cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti){
        try{
            $data = $request->all();
            $data['pegawai_id'] = Auth::user()->pegawai->id;

            $cuti->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data cuti');
        }

        return redirect()->route('cuti.index')->with('success','Data cuti berhasil diubah!');
    }

    public function destroy(Cuti $cuti){
        try{
            $this->cutiRepo->destroy($cuti);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data cuti']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data cuti']);
    }
}
