<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Aspirasi;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortbyDesc('updated_at');
        return view('pages.index',['posts' => $posts]);
    }
    public function aspirasitambah(Request $request)
    {
        $aspir = new Aspirasi;
        // return $request;
        $aspir->nama = $request->nama;
        $aspir->aspirasi = $request->aspirasi;
        $aspir->save();
        // return redirect('/')->with('success','Aspirasi Anda telah kami terima!');
        return redirect()->back()->with('success','Aspirasi Anda telah kami terima!');
    }
    public function bemindex()
    {
        return view('pages.bemftuts');
    }
    public function bphpagesindex()
    {
        $posts = Post::all()->where('bidang_id', 9);
        $post = $posts->sortByDesc('updated_at');
        return view('pages.bph.index',['posts' => $post]);
        // dd($post);
    }
    public function internalpagesindex()
    {
        $posts = Post::all()->where('bidang_id', 8);
        $post = $posts->sortByDesc('updated_at');
        return view('pages.internal.index',['posts' => $post]);
    }
    public function relasipagesindex()
    {
        $posts = Post::all()->where('bidang_id', 10);
        $post = $posts->sortByDesc('updated_at');
        return view('pages.relasi.index',['posts' => $post]);
    }
    public function sospolpagesindex()
    {
        $posts = Post::all()->where('bidang_id', 11);
        $post = $posts->sortByDesc('updated_at');
        return view('pages.sospol.index',['posts' => $post]);
    }
    public function medinfopagesindex()
    {
        $posts = Post::all()->where('bidang_id', 1);
        $post = $posts->sortByDesc('updated_at');
        return view('pages.medinfo.index',['posts' => $post]);
    }
    public function ekrafpagesindex()
    {
        $posts = Post::all()->where('bidang_id', 12);
        $post = $posts->sortByDesc('updated_at');
        return view('pages.ekraf.index',['posts' => $post]);
    }
    public function galeripagesindex()
    {

        $posts = Post::paginate(6);
        return view('pages.galeri.index',['posts' => $posts]);
    }

    // End of Pages Controller
}
