<?php

namespace App\Http\Controllers;

use App\DataTables\SakitDatatable;
use App\Model\Sakit;
use App\Repositories\SakitRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SakitController extends Controller{
    protected $sakitRepo;
    protected $userRepo;

    public function __construct(SakitRepository $sakitRepo, UserRepository $userRepo){
        $this->sakitRepo = $sakitRepo;
        $this->userRepo = $userRepo;
    }
    
    public function index(){
        return view('sakit.index');
    }

    public function datatable(){
        if(userRole() == 'admin'){
            $sakit = $this->sakitRepo->getAllData();
        }else{
            $sakit = $this->sakitRepo->getAllData()->where('pegawai_id', Auth::user()->pegawai->id);
        }

        return SakitDatatable::set($sakit);
    }

    public function create(){
        $pegawai = $this->userRepo->getAllPegawai()->pluck('nama', 'id');
        return view('sakit.create', compact('pegawai'));
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['surat_ket'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            $data['surat_ket'] = $upload_image;
            $data['pegawai_id'] = Auth::user()->pegawai->id;

            // dd($data);

            $this->sakitRepo->store($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan sakit');
        }

        return redirect()->route('sakit.index')->with('success','sakit berhasil disimpan!');
    }

    public function show(sakit $sakit){
        //
    }

    public function edit(Sakit $sakit){
        $pegawai = $this->userRepo->getAllPegawai()->pluck('nama', 'id');
        return view('sakit.edit', compact('sakit', 'pegawai'));
    }

    public function update(Request $request, Sakit $sakit){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['foto'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            $data['foto'] = $upload_image;

            $sakit->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan sakit');
        }

        return redirect()->route('sakit.index')->with('success','sakit berhasil disimpan!');
    }

    public function destroy(Sakit $sakit){
        try{
            $this->sakitRepo->destroy($sakit);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus sakit']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus sakit']);
    }
}
