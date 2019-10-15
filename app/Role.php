<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
//tanda bahwa tabel User punya relasi Many dg tabel Post
    public function user(){
        return $this->hasMany('App\User');
    }
}
