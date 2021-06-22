<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware{

    public function handle($request, Closure $next, $role_name){
        $role = $role_name == 'pegawai' ? 1 : 0;
        if(Auth::user()->level != $role){
            abort(403);
        }
        return $next($request);
    }
}
