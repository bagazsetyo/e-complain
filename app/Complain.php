<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Complain extends Model
{
    use SoftDeletes;


    // meshassigment bisa input data secara langsung
    //tidak menggunakan protect tabel karena supaya data dengan value kosong atau null tidak dapat masuk
    protected $fillable = [
        'user_id','sub','date','description','status'
    ];

    protected $hidden = [

    ];

    // relasi
    public function complaints()
    {
        return $this->hasMany(Gallerie::class,'complaints_id');
    }
    //relasi
    public function auth()
    {
        return $this->hasMany(User::class,'id');
    }

}
