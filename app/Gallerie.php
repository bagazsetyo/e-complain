<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Gallerie extends Model
{
    use SoftDeletes;


    //tidak menggunakan protect tabel karena supaya data dengan value kosong atau null tidak dapat masuk
    // meshassigment bisa input data secara langsung
    protected $fillable = [
        'complaints_id','photo','is_default'
    ];

    protected $hidden = [

    ];

    // relasi
    public function galleries()
    {
        return $this->belongsTo(Complain::class,'complaints_id','id');
    }


    // menggunakan assesor dan mutator agar menyertakan url pada foto
    //get bawaan laravel, Photo fild di database, attribute bawaan laravel
    public function getPhotoAttribute($value)
    {
        //jika ingin menggunakan storage pada laravel harus menjalankan perintah
        //php artisan storage:link
        return url('storage/' . $value); 
    }

}
