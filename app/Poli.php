<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poli extends Model
{
    use SoftDeletes;
    protected $table = "poli";
    protected $fillable = ["nama_poli"];

    public function pasien()
    {
        return $this->hasMany(Pasien::class, "id", "keluhan");
    }
}
