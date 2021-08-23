<?php

namespace App\Models;

use Database\Seeders\target_pencapaian_kkidSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target_pembelajaran extends Model
{
    use HasFactory;
    protected $table = 'target_pembelajaran';
    protected $guarded = [];

    public function bidang_keahlian()
    {
        return $this->belongsTo(Bidang_keahlian::class, 'id_bidang_keahlian');
    }
    public function kd_target_pemebelajaran()
    {
        return $this->hasMany(Kd_target_pembelajaran::class, 'id_target_pembelajaran','id');
    }
    public function rincian_bukti()
    {
        return $this->hasMany(Rincian_bukti::class,'id_target_pembelajaran','id');
    }

    public function kompetensi_inti()
    {
        return $this->hasMany(Kompetensi_inti::class,'id_target_pembelajaran','id');
    }

    public function target_pencapaian_mapel()
    {
        return $this->hasMany(Target_pencapaian_mapel::class,'id_target_pembelajaran','id');
    }

    public function target_pencapaian_kkd()
    {
        return $this->hasMany(Target_pencapaian_kkd::class, 'id_target_pembelajaran', 'id');
    }
}
