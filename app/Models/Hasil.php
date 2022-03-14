<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}