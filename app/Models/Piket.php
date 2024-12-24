<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piket extends Model
{
    protected $guarded = ["id"];
    protected $table = "piket";

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function scopeSearch($query, $search) {
        return $query->where(function ($query) use ($search) {
            $query->whereHas("siswa", function ($query) use ($search) {
                $query->where("name", "LIKE", "%$search%");
            })->get();
        });
    }
}
