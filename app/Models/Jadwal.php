<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Jadwal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function hasil()
    {
        return $this->belongsTo(Hasil::class);
    }
}
