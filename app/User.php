<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bidang_id', 'prodi_id', 'role_id', 'name', 'email', 'password', 'nim', 'angkatan', 'no_telp', 'alamat', 'avatar','created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function bidang(){
        return $this->belongsTo('App\Bidang');
    }
    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function mahasiswa(){
        return $this->hasMany('App\Mahasiswa');
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
}
