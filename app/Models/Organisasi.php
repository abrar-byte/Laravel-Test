<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;



class Organisasi extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['jadwal','anggota'];

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function anggota()
    {
        return  $this->belongsToMany(Anggota::class);
    }

    public function jadwal()
    {
        return  $this->hasMany(Jadwal::class);
    }

    public function olahraga()
    {
        return $this->belongsTo(Olahraga::class);
    }
  
    public function getRouteKeyName()
    
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
