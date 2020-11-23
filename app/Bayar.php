<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bayar extends Model
{
    use SoftDeletes;
    protected $table = "bayar";
    protected $fillable = ["id_perawat", "id_pasien", "jumlah_harga"];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, "id_pasien", "id");
    }

    public function perawat()
    {
        return $this->belongsTo(Perawat::class, "id_perawat", "id");
    }
}
