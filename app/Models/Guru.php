<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = ['email','password','_token'];
    // protected $filable =  [
    //     'nik',
    //     'jabatan',
    //     'alamat',
    //     'fax',
    //     'no_telp',
    //     'id_jurusan',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user'); // foreign , owner
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
    public function bidang_keahlian()
    {
        return $this->hasMany(Bidang_keahlian::class,'id_guru','id');
    }
}
