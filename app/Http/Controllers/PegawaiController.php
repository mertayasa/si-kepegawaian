<?php

namespace App\Http\Controllers;

use App\DataTables\PegawaiDatatable;
use App\Http\Requests\PegawaiRequest;
use App\Model\Pegawai;
use App\Repositories\UserRepository;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller{

    protected $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    // tampilkan data pegawai
    public function index(){
        return view('pegawai.view');
    }
    
    public function datatable(){
        $pegawai = $this->userRepo->getAllPegawai();
        return PegawaiDatatable::set($pegawai);
    }

    public function destroy(Pegawai $pegawai){
        $pegawai->delete();
        return redirect()->route('pegawai')->with('message1','Data berhasil dihapus!');
    }

    // method untuk edit
    public function edit(Pegawai $pegawai){
        return view('pegawai.edit',['pegawai' => $pegawai]);
    }

    //metode update
    public function update(PegawaiRequest $request, Pegawai $pegawai){
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['foto'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }

            if($data['password']){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }

            $data['foto'] = $upload_image;
            // $data['jabatan'] = getJabatan($data['golongan']);
    
            $pegawai->user->update($data);
            $pegawai->update($data);

        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah pegawai !');
        }

        return redirect()->route('pegawai.index')->with('success','Data berhasil diubah!');
    }

    //tambah data
    public function tambah(){
        return view('pegawai.tambah');
    }

    public function simpan(PegawaiRequest $request){
        
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['foto'], true);
            $upload_image = uploadFile($base_64_foto);
            
            if($upload_image == 0){
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }
    
            $data['foto'] = $upload_image;
            $data['level'] = 1;
            $data['password'] = bcrypt($data['password']);
            // $data['jabatan'] = getJabatan($data['golongan']);
    
            $stored_user = $this->userRepo->store($data);
            $stored_user->pegawai()->create($data);

        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan pegawai');
        }


        return redirect()->route('pegawai.index')->with('success','Data berhasil disimpan!');
    }

}
