<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inap extends Model
{
    use SoftDeletes;
    protected $table = "inap";
    protected $fillable = ["id_ruang", "id_pasien"];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, "id_pasien", "id");
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, "id_ruang", "id");
    }
}
