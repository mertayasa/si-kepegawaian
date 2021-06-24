<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        //
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(){
        //
    }

    public function edit(){
        return view('profile_user.edit');
    }



    public function updateProfile(User $user, Request $request){
        if(Auth::id() != $user->id){
            abort(403);
        }

        try{
            $data = $request->all();
            if($data['password']){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }

            $this->userRepo->update($user, $data);

            if(checkUserLevel() == 1){
                $this->employeeRepo->update($user->employee, $data);
            }
            if(checkUserLevel() == 2){
                $this->customerRepo->update($user->customer, $data);
            }
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah profil '. $user->name);
        }

        return redirect()->back()->with('success', 'Berhasil mengubah profil '. $user->name);
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy(){
       //
    }
}


