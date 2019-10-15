<?php

namespace App\Http\Middleware;

use Closure;

class checkBidangEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->bidang);
        if($request->user()->role->roles == 'admin'|| $request->user()->role->roles == 'superadmin' || $request->user()->id == 11) {
            return $next($request);
        }
        return redirect('/dashboard')->with('error','Perubahan Gagal, Kamu tidak Diizinkan Mengakses Modul Ini!');
        // dd($request->path());
    }
}
