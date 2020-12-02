<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use SoftDeletes;
    protected $table = "pasien";
    protected $fillable = ["nama_pasien", "alamat_pasien", "tgl_periksa", "keluhan", "id_dokter", "jenis_penjamin", "obat", "jenis_kelamin", "no_hp", "tgl_lahir", "no_urut"];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, "id_dokter", "id");
    }
    public function poli()
    {
        return $this->belongsTo(Poli::class, "keluhan", "id");
    }

    public function inap()
    {
        return $this->hasMany(Inap::class, "id", "id_pasien");
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class, "id", "id_pasien");
    }
}
