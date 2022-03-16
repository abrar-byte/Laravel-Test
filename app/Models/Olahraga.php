<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;




class Olahraga extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    use CascadeSoftDeletes;
    protected $guarded = ['id'];

    protected $cascadeDeletes = ['organisasi'];

    protected $dates = ['deleted_at'];

    public function organisasi()
    {
        return  $this->hasMany(Organisasi::class);
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
