<?php

namespace App\Http\Controllers;

use App\DataTables\SuratDatatable;
use App\Http\Requests\SuratRequest;
use App\Model\Surat;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuratController extends Controller{

    protected $suratRepo;
    protected $userRepo;

    public function __construct(SuratRepository $suratRepo, UserRepository $userRepo){
        $this->suratRepo = $suratRepo;
        $this->userRepo = $userRepo;
    }
    
    public function index(){
        return view('surat.index');
    }

    public function datatable(){
        $surat = $this->suratRepo->getAllData();
        return SuratDatatable::set($surat);
    }

    public function create(){
        $pegawai = $this->userRepo->getAllPegawai()->pluck('nama', 'nip');
        return view('surat.create', compact('pegawai'));
    }

    public function store(SuratRequest $request){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['foto'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            $data['foto'] = $upload_image;

            $this->suratRepo->store($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan surat');
        }

        return redirect()->route('surat.index')->with('success','Surat berhasil disimpan!');
    }

    public function show(Surat $surat){
        //
    }

    public function edit(Surat $surat){
        $pegawai = $this->userRepo->getAllPegawai()->pluck('nama', 'nip');
        return view('surat.edit', compact('surat', 'pegawai'));
    }

    public function update(SuratRequest $request, Surat $surat){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['foto'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            $data['foto'] = $upload_image;

            $surat->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan surat');
        }

        return redirect()->route('surat.index')->with('success','Surat berhasil disimpan!');
    }

    public function destroy(Surat $surat){
        try{
            $this->suratRepo->destroy($surat);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus surat']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus surat']);
    }
}
