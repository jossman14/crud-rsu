<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruang extends Model
{
    use SoftDeletes;
    protected $table = "ruang";
    protected $fillable = ["nama_ruang", "nama_gedung"];

    public function inap()
    {
        return $this->hasMany(Inap::class, "id", "id_ruang");
    }
}
