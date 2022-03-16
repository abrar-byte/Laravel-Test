<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;



class Jadwal extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;


    protected $guarded = ['id'];
    protected $cascadeDeletes = ['hasil'];
    protected $dates = ['deleted_at'];


    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function hasil()
    {
        return $this->hasOne(Hasil::class);
    }
}
