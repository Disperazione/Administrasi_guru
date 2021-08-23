<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang_keahlian extends Model
{
    use HasFactory;
    protected $table = 'bidang_keahlian';
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan'); //foreign key
    }
    public function kompetensi_dasar()
    {
        return $this->hasMany(Kompetensi_dasar::class,'id_bidang_keahlian','id');
    }

    public function target_pembelajaran()
    {
        return $this->hasOne(Target_pembelajaran::class,'id_bidang_keahlian','id');
    }

    public function lembar_kerja()
    {
        return $this->hasOne(Lembar_kerja::class, 'id_bidang_keahlian','id'); // foreign , owner
    }

}
