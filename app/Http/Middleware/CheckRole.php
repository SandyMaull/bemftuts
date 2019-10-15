<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        if(in_array($request->user()->role->roles,$roles)) {
            return $next($request);
            
        }
        return redirect('/dashboard')->with('error','Perubahan Gagal, Kamu tidak Diizinkan Mengakses Modul Ini!');
        // dd($request);
    }
}
