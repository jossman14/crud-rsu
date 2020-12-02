<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Daftar extends Model
{
    use SoftDeletes;
    protected $table = "daftar";
    protected $fillable = ["nama", "tgl_lahir", "alamat", "jenis_kelamin", "gejala", "no_antrian", "tgl_periksa", "obat", "nama_dokter", "poli", "jenis_penjamin", "no_hp"];
}
