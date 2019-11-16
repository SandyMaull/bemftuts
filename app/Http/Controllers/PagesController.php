<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Post;
use App\User;
use App\Aspirasi;
use App\Mail;

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

    public function regispengurusindex()
    {
        return view('validasi');
    }
    public function regispengurusshow(Request $request)
    {
        // return view('regis');
        // dd($request->all());
        if ($request->password == "Totalitas_Bersinergi" || $request->password == "totalitas_bersinergi" || 
        $request->password == "TOTALITAS_BERSINERGI"){
            return view('regis');
        } else {
            return redirect()->back()->with('error','Kode Validasi Salah, Check Kembali Kode!');
        }
    }
    public function regispengurusstore(Request $request)
    {
        // dd($request->all());
        $users = new User;
        $users->bidang_id = $request->bidang;
        $users->prodi_id = $request->prodi;
        $users->role_id = $request->role;
        $users->name = $request->name;
        $users->nim = $request->nim;
        $users->email = $request->email;
        $users->password = Hash::make($request->password, [
            'rounds' => 12
        ]);
        $users->angkatan = $request->angkatan;
        $users->no_telp = $request->notelp;
        $users->alamat = $request->alamat;
        if($request->avatar === null) {
            $avatar = null;
        } else {
            $avatar = $request->avatar;
        }
        $users->avatar = $avatar;
        $users->created_by = $request->created_by;

        // dd($users);
        $users->save();
        return redirect('/login')->with('success','User Berhasil Ditambahkan!, Silahkan Login');
    }
    // End of Pages Controller
}
