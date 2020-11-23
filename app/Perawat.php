<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perawat extends Model
{
    use SoftDeletes;
    protected $table = "perawat";
    protected $fillable = ["nama_perawat", "alamat_perawat", "jam_jaga"];

    public function shift()
    {
        return $this->belongsTo(Shift::class, "jam_jaga", "id");
    }
    public function bayar()
    {
        return $this->hasMany(Bayar::class, "id", "id_perawat");
    }
}
