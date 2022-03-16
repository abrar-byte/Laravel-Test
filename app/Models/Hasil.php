<?php

namespace App\Models;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Hasil extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function anggota()
    {
        return $this->belongsToMany(Anggota::class)->withPivot(['contribution']);
    }
}
