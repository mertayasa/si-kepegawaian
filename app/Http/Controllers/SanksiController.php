<?php

namespace App\Http\Controllers;

use App\DataTables\SanksiDatatable;
use App\Http\Requests\SanksiRequest;
use App\Model\Pegawai;
use App\Repositories\SanksiRepository;
use App\Repositories\UserRepository;
use App\Model\Sanksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SanksiController extends Controller{
    protected $sanksiRepo;
    protected $userRepo;

    public function __construct(SanksiRepository $sanksiRepo, UserRepository $userRepo){
        $this->sanksiRepo = $sanksiRepo;
        $this->userRepo = $userRepo;
    }
    
    public function index(){
        return view('sanksi.index');
    }

    public function datatable(){
        if(userRole() == 'admin'){
            $sanksi = $this->sanksiRepo->getAllData();
        }else{
            $sanksi = $this->sanksiRepo->getAllData()->where('pegawai_id', Auth::user()->pegawai->id);
        }

        return SanksiDatatable::set($sanksi);
    }

    public function create(){
        $pegawai = $this->userRepo->getAllPegawai()->pluck('nama', 'id');
        return view('sanksi.create', compact('pegawai'));
    }

    public function store(SanksiRequest $request){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['surat_sanksi'], true);
            $upload_image = uploadFile($base_64_foto);

            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            $pegawai = Pegawai::find($data['pegawai_id']);
            $data['surat_sanksi'] = $upload_image;
            $data['golongan'] = $pegawai->golongan;
            $data['jabatan'] = getJabatan($pegawai->golongan);

            $this->sanksiRepo->store($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sanksi');
        }

        return redirect()->route('sanksi.index')->with('success','Data sanksi berhasil disimpan!');
    }

    public function show(Sanksi $sanksi){
        //
    }

    public function edit(Sanksi $sanksi){
        $pegawai = $this->userRepo->getAllPegawai()->pluck('nama', 'id');
        return view('sanksi.edit', compact('sanksi', 'pegawai'));
    }

    public function update(SanksiRequest $request, Sanksi $sanksi){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['surat_sanksi'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            $pegawai = Pegawai::find($data['pegawai_id']);
            $data['surat_sanksi'] = $upload_image;
            $data['golongan'] = $pegawai->golongan;
            $data['jabatan'] = getJabatan($pegawai->golongan);

            $sanksi->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data sanksi');
        }

        return redirect()->route('sanksi.index')->with('success','Data sanksi berhasil dirubah!');
    }

    public function destroy(Sanksi $sanksi){
        try{
            $this->sanksiRepo->destroy($sanksi);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data sanksi']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data sanksi']);
    }
}
