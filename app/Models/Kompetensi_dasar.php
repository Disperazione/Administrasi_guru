<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi_dasar extends Model
{
    use HasFactory;
    protected $table = 'kompetensi_dasar';
    protected $guarded = [];

    public function bidang_keahlian()
    {
        return $this->belongsTo(Bidang_keahlian::class, 'id_bidang_keahlian'); // foreign
    }
    public function kd_target_pemebelajaran()
    {
        return $this->hasMany(Kd_target_pembelajaran::class, 'id_kompetensi_dasar', 'id');
    }
    public function strategi_pembelajaran()
    {
        return $this->hasOne(Strategi_pembelajaran::class,'id_kompetensi_dasar','id'); // foreign , owner
    }
    public function indikator_ketercapaian()
    {
        return $this->hasOne(Indikator_ketercapaian::class, 'id_kompetensi_dasar','id');
    }
    public function materi_bahan_ajar()
    {
        return $this->hasOne(Materi_bahan_ajar::class,'id_kompetensi_dasar','id');
    }
    public function rencana_pelaksanaan_pembelajaran()
    {
        return $this->hasOne(Rencana_pelaksanaan_pembelajaran::class,'id_kompetensi_dasar','id');
    }
    public function ipk_kompetensi_dasar()
    {
        return $this->hasMany(Ipk_kompetensi_dasar::class, 'id_kompetensi_dasar', 'id');
    }
}
