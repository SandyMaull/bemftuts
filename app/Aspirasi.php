<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    protected $fillable = [
        'nama', 'aspirasi'
    ];
}
