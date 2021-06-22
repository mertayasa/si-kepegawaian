<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin{

    public function handle($request, Closure $next){
        if(Auth::user()->level == 0){
            abort(403);
        }
        return $next($request);
    }
}
