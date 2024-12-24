<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = ["id"];
    protected $table = "jadwal";

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}
