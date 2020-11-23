<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
    use SoftDeletes;
    protected $table = "dokter";
    protected $fillable = ["nama_dokter", "alamat_dokter", "spesialisasi_dokter_id"];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, "spesialisasi_dokter_id", "id");
    }

    public function pasien()
    {
        return $this->hasMany(Pasien::class, "id", "id_dokter");
    }
}
