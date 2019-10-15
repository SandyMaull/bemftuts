<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title', 'body', 'gambar', 'user_id', 'bidang_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function bidang(){
        return $this->belongsTo('App\Bidang');
    }
    
}
