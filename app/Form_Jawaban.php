<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Jawaban extends Model
{
    protected $table = 'form_jawaban';
    public $timestamps = false;
    protected $fillable = [
        'field_id', 'jumlah_data', 'jawaban_field'
    ];

    public function form_field(){
        return $this->belongsTo('App\Form_Field', 'field_id');
    }
}
