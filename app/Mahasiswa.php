<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['prodi_id','nama','nim','no_telp','angkatan','email','alamat','telegram','edit_by'];
    
    //tanda bahwa tabel Post punya relasi hubungan dg user
    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }
    public function user(){
        return $this->belongsTo('App\User', 'edit_by');
    }
}
