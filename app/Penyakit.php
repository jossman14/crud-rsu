<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = "penyakit";
    protected $primaryKey = "id";
    protected $fillable = ["nama_penyakit"];

    public function dokter()
    {
        return $this->hasMany(Dokter::class, "id", "spesialisasi_dokter_id");
    }
}
