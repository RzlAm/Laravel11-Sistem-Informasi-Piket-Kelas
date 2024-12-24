<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    protected $table = "siswa";

    public function scopeSearch($query, $search) {
        return $query->where("name", "LIKE", "%$search%");
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }

    public function piket() {
        return $this->hasOne(Piket::class);
    }
}
