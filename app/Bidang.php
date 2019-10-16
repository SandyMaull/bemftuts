<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';
//tanda bahwa tabel User punya relasi Many dg tabel Post
    public function user(){
        return $this->hasMany('App\User');
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
}
