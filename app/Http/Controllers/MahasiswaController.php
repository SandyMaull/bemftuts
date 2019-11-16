<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_mahasiswa = Mahasiswa::where('nama','LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_mahasiswa = Mahasiswa::all();
            $latest = Mahasiswa::where('updated_at', Mahasiswa::max('updated_at'))->orderBy('id','desc')->first();
            // dd($latest);
            if ($latest === null) {
                $update = "NULL";
                $updateby = "NULL";
                $jbt = "NULL";
            } else {
                $update = $latest->updated_at;
                $updateby = $latest->user->name;
                $jbt = $latest->user->bidang->bidang;
            }

        }
        return view( 'mahasiswa.index',['data_mahasiswa' => $data_mahasiswa, 'updated' => $update, 'updated_by' => $updateby, 'jbt' => $jbt] );
    }
    public function create(Request $request)
    {
        $data_mahasiswa = new Mahasiswa;
        $data_mahasiswa->nama = $request->nama;
        $data_mahasiswa->nim = $request->nim;
        $data_mahasiswa->no_telp = $request->no_telp;
        $data_mahasiswa->prodi_id = $request->prodi;
        $data_mahasiswa->angkatan = $request->angkatan;
        $data_mahasiswa->email = $request->email;
        $data_mahasiswa->alamat = $request->alamat;
        $data_mahasiswa->edit_by = $request->editby;


        // $data_mahasiswa->telegram = $request->telegram;
        // dd($request);

        if( $request->has('telegram') ){
            $data_mahasiswa->telegram = 1;
        } else {
            $data_mahasiswa->telegram = 0;
        }
        $data_mahasiswa->save();

        return redirect('/mahasiswa')->with('success','Data Berhasil Ditambahkan!');
    }
    public function update(Request $request)
    {   
        // $data = array(
        //     'id' => $request->id,
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'prodi' => $request->prodi,
        //     'angkatan' => $request->angkatan,
        //     'email' => $request->email,
        //     'alamat' => $request->alamat,
        //     'no_telp' => $request->no_telp,
        //     'telegram' => $request->telegram,
        // );
        // dd($id);
        // echo "<pre>"; print_r($data); die;


        $data_mahasiswa = Mahasiswa::find($request->id);
        $data_mahasiswa->nama = $request->nama;
        $data_mahasiswa->nim = $request->nim;
        $data_mahasiswa->no_telp = $request->no_telp;
        $data_mahasiswa->prodi_id = $request->prodi;
        $data_mahasiswa->angkatan = $request->angkatan;
        $data_mahasiswa->email = $request->email;
        $data_mahasiswa->alamat = $request->alamat;
        $data_mahasiswa->edit_by = $request->editby;

        // dd($request);
        // $data_mahasiswa->telegram = $request->telegram;

        if( $request->telegram == 1 ){
            $data_mahasiswa->telegram = 1;
        } else {
            $data_mahasiswa->telegram = 0;
        }
        $data_mahasiswa->save();


        // echo "<pre>"; print_r($data_mahasiswa); die;


        return redirect('/mahasiswa')->with('success','Data Berhasil Diubah!');
    }
    public function destroy(Request $request)
    {   
        // $id = $request->id;
        // dd($id);
        // echo "<pre>"; print_r($id); die;

        $user = Mahasiswa::find($request->id);
        $user->delete();

        return redirect('/mahasiswa')->with('warning', 'Data Berhasil Dihapus!');

    }
}
