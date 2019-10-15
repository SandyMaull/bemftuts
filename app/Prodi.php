<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
//tanda bahwa tabel User punya relasi Many dg tabel Post
    public function mahasiswa(){
        return $this->hasMany('App\Mahasiswa');
    }
    public function user(){
        return $this->hasMany('App\User');
    }
}
