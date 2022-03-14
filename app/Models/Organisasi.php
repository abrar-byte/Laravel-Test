<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Organisasi extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function anggota()
    {
        return  $this->hasMany(Anggota::class);
    }

    public function jadwal()
    {
        return  $this->hasMany(Jadwal::class);
    }

    // public Function schedule()
    // {
    //     return  $this->hasMany(Schedule::class);
    // }
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
