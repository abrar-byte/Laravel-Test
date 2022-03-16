<?php

namespace App\Models;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;



class Hasil extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    protected $cascadeDeletes = ['anggota'];

    protected $dates = ['deleted_at'];


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
