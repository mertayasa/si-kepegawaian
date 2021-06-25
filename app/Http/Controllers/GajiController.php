<?php

namespace App\Http\Controllers;

use App\DataTables\GajiDatatable;
use App\Model\Gaji;
use App\Repositories\GajiRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GajiController extends Controller
{
    protected $gajiRepo;

    public function __construct(GajiRepository $gajiRepo){
        $this->gajiRepo = $gajiRepo;
    }
    
    public function index(){
        return view('gaji.index');
    }

    public function datatable(){
        $gaji = $this->gajiRepo->getAllData();
        return GajiDatatable::set($gaji);
    }

    public function create(){
        return view('gaji.create');
    }

    public function store(Request $request){
        // try{
        //     $data = $request->all();
        //     $data['pegawai_id'] = Auth::user()->pegawai->id;

        //     $this->gajiRepo->store($data);
        // }catch(Exception $e){
        //     Log::info($e->getMessage());
        //     return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data gaji');
        // }

        // return redirect()->route('gaji.index')->with('success','Data gaji berhasil disimpan!');
    }

    public function edit(Gaji $gaji){
        return view('gaji.edit', compact('gaji'));
    }

    public function update(Request $request, Gaji $gaji){
        try{
            $data = $request->all();
            $gaji->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengubah data gaji']);
        }

        return response(['code' => 1, 'message' => 'Berhasil mengubah data gaji']);
    }

    public function destroy(Gaji $gaji){
        // try{
        //     $this->gajiRepo->destroy($gaji);
        // }catch(Exception $e){
        //     Log::info($e->getMessage());
        //     return response(['code' => 0, 'message' => 'Gagal menghapus data gaji']);
        // }

        // return response(['code' => 1, 'message' => 'Berhasil menghapus data gaji']);
    }
}
