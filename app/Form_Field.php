<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Field extends Model
{
    protected $table = 'form_field';
    public $timestamps = false;
    protected $fillable = [
        'form_id', 'nama_field'
    ];

    public function form_jawaban(){
        return $this->hasMany('App\Form_Jawaban');
    }
    public function form(){
        return $this->belongsTo('App\Form', 'form_id');
    }
}
