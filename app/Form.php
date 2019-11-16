<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form';
    public $timestamps = false;
    protected $fillable = [
        'nama_form', 'jumlah_field'
    ];
    
    public function form_field(){
        return $this->hasMany('App\Form_Field');
    }
}
