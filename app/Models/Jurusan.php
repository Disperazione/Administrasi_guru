<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $guarded = ['_token'];

    // public function guru()
    // {
    //     return $this->hasMany(Guru::class, 'id_jurusan','id');
    // }
    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_jurusan' , 'id_jurusan', 'id_guru'); // pivot,  owner , foreign
    }
    public function bidang_keahlian()
    {
        return $this->hasMany(Bidang_keahlian::class, 'id_jurusan', 'id'); //foreign owner
    }
}
