<?php

namespace App\Http\Controllers;

use App\User;
use App\Mahasiswa;
use App\Post;
use App\Aspirasi;
use App\Bidang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $total_mhs = Mahasiswa::all()->count();
        $total_pngrs = $users->count();
        
        return view('admin.index' ,['users' => $users , 'totalmhs' => $total_mhs , 'totalpng' => $total_pngrs]);
    }
    public function bidangindex($bidang){
        if($bidang == 'BPH'){
            $posts = Post::all()->where('bidang_id', 9);
            $bidang_id = 9;
            $latest = $posts->sortbyDesc('updated_at')->first();
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }
            return view('admin.posts.index',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt]);
            // dd($bidang);
        } else if($bidang == 'Internal'){
            $posts = Post::all()->where('bidang_id', 8);
            $bidang_id = 8;
            $latest = $posts->sortByDesc('updated_at')->first();
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }
            return view('admin.posts.index',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt]);
        } else if($bidang == 'Relasi'){
            $posts = Post::all()->where('bidang_id', 10);
            $bidang_id = 10;
            $latest = $posts->sortByDesc('updated_at')->first();
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }
            return view('admin.posts.index',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt]);
        } else if($bidang == 'Sospol'){
            $posts = Post::all()->where('bidang_id', 11);
            $bidang_id = 11;
            $latest = $posts->sortByDesc('updated_at')->first();
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }
            return view('admin.posts.index',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt]);
        } else if($bidang == 'MEDINFO'){
            $posts = Post::all()->where('bidang_id', 1);
            $bidang_id = 1;
            $latest = $posts->sortByDesc('updated_at')->first();
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }
            
            return view('admin.posts.index',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt]);
        } else if($bidang == 'Ekraf'){
            $posts = Post::all()->where('bidang_id', 12);
            $bidang_id = 12;
            $latest = $posts->sortByDesc('updated_at')->first();
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }
            return view('admin.posts.index',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt]);
        }
        else {
            abort(404);
        }
    }
    public function aspirasiindex()
    {
        $aspir = Aspirasi::all();
        return view('admin.aspirasi',['aspirasi'=> $aspir]);
    }
    public function bidangtambah(Request $request,$bidang){
        $posts = new Post;
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' || 
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            // dd( $request->bidangid );
            if(Bidang::findOrFail( $request->bidangid )){
                if($request->hasFile('gambar')){
                    $this->validate($request, [
                        'gambar' => 'image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:8192'
                    ]);
                    
                    // Ambil Gambar dari Form
                    $filegambar = $request->file('gambar');
                    //MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '_' . $filegambar->getClientOriginalName();
                    //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
                    // Image::make($filegambar)->save('assets/img/posts/' . $fileName);
                    $canvas = Image::canvas(1349, 878);
                    $resizeImage  = Image::make($filegambar)->resize(1349, 878, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $canvas->insert($resizeImage, 'center');
                    //SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
                    $canvas->save('assets/img/posts/' . $fileName);
                    $posts->gambar = $fileName;
                }
                else {
                    $posts->gambar = "bem.png";
                }
                $posts->title = $request->title;
                $posts->body = $request->body;
                $posts->user_id = $request->userid;
                $posts->bidang_id = $request->bidangid;
            }
        }
        else {
            abort(404);
        }
        $posts->save();
        return redirect('/admin'.'/'.$bidang)->with('success','Post Berhasil Ditambahkan!');
        

    }
    public function bidangshow(Request $request, $bidang, $id){
        $posts = Post::findOrFail($id);
        if($bidang == 'BPH'){
            $bidang_id = 9;
            return view('admin.posts.edit',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts]);
        } else if($bidang == 'Internal'){
            $bidang_id = 8;
            return view('admin.posts.edit',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts]);
        } else if($bidang == 'Relasi'){
            $bidang_id = 10;
            return view('admin.posts.edit',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts]);
        } else if($bidang == 'Sospol'){
            $bidang_id = 11;
            return view('admin.posts.edit',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts]);
        } else if($bidang == 'MEDINFO'){
            $bidang_id = 1;
            return view('admin.posts.edit',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts]);
        } else if($bidang == 'Ekraf'){
            $bidang_id = 12;
            return view('admin.posts.edit',['bidang_id' => $bidang_id, 'bidang'=> $bidang, 'posts' => $posts]);
        }
        else {
            abort(404);
        }
    }
    public function bidangedit(Request $request,$bidang){
        $posts = Post::find($request->id);
        if($request->hasFile('gambar')){
            $this->validate($request, [
                'gambar' => 'image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:8192'
            ]);
            File::delete('assets/img/posts/'.$posts->gambar);
            // Ambil Gambar dari Form
            $filegambar = $request->file('gambar');
            //MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '_' . $filegambar->getClientOriginalName();
            //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
            // Image::make($filegambar)->save('assets/img/posts/' . $fileName);
            $canvas = Image::canvas(1349, 878);
            $resizeImage  = Image::make($filegambar)->resize(1349, 878, function($constraint) {
                $constraint->aspectRatio();
            });
            $canvas->insert($resizeImage, 'center');
            //SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
            $canvas->save('assets/img/posts/' . $fileName);
            $posts->gambar = $fileName;
        }
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $posts->title = $request->title;
            $posts->body = $request->body;
            $posts->user_id = $request->userid;
            $posts->bidang_id = $request->bidangid;
            $posts->save();
        }
        else {
            abort(404);
        }
        return redirect('/admin'.'/'.$bidang)->with('warning', 'Post Berhasil Diedit!');
    }
    public function bidangdelete(Request $request,$bidang){
        $posts = Post::find($request->id);
        if($bidang == 'BPH'){
            File::delete('assets/img/posts/'.$posts->gambar);
            $posts->delete();
        } else if($bidang == 'Internal'){
            File::delete('assets/img/posts/'.$posts->gambar);
            $posts->delete();
        } else if($bidang == 'Relasi'){
            File::delete('assets/img/posts/'.$posts->gambar);
            $posts->delete();
        } else if($bidang == 'Sospol'){
            File::delete('assets/img/posts/'.$posts->gambar);
            $posts->delete();
        } else if($bidang == 'MEDINFO'){
            File::delete('assets/img/posts/'.$posts->gambar);
            $posts->delete();
        } else if($bidang == 'Ekraf'){
            File::delete('assets/img/posts/'.$posts->gambar);
            $posts->delete();
        }
        else {
            abort(404);
        }
        return redirect('/admin'.'/'.$bidang)->with('warning', 'Post Berhasil Dihapus!');
    }
    public function pengurus()
    {
        $users = User::all();
        $latest = User::where('updated_at', User::max('updated_at'))->orderBy('id','desc')->first();
        $update = $latest->updated_at;
        $updateby = $latest->created_by;
        return view('admin.pengurus',['users' => $users, 'updated' => $update, 'updated_by' => $updateby]);
    }
    public function create(Request $request)
    {
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
        $users->no_telp = $request->no_telp;
        $users->alamat = $request->alamat;
        $users->avatar = $request->avatar;
        $users->created_by = $request->editby;

        $users->save();
        return redirect('/admin')->with('success','Data Berhasil Ditambahkan!');

    }
    public function update(Request $request)
    {
        $users = User::find($request->id);
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
        $users->no_telp = $request->no_telp;
        $users->alamat = $request->alamat;
        $users->avatar = $request->avatar;
        $users->created_by = $request->editby;

        $users->save();

        return redirect('/admin')->with('success','Data Berhasil Diubah!');
    }
    public function destroy(Request $request)
    {

        $user = User::find($request->id);
        $user->delete();

        return redirect('/admin')->with('warning', 'Data Berhasil Dihapus!');

    }
}
