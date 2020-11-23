<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use SoftDeletes;
    protected $table = "shift";
    protected $fillable = ["nama_shift"];

    public function perawat()
    {
        return $this->hasMany(Perawat::class, "id", "jam_jaga");
    }
}
