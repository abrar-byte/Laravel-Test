<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    // fillable berarti yg boleh diisi
    // protected $fillable = ['name','excerpt','body'];
    // guarded berarti yg tidak boleh diisi hanya
    protected $guarded = ['id'];
    protected $with = ['organisasi'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false){
        return $query->where('name','like', '%' . $filters['search'] . '%');
        }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('name', 'like', '%' . $search . '%');
             });
         });

         $query->when($filters['organisasi'] ?? false, function($query, $organisasi){
             return $query->whereHas('organisasi', function($query) use ($organisasi){
                 $query->where('slug',$organisasi);
             }); 
         });

    
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

   


    // public function game()
    // {
    // 	return $this->belongsToMany(Game::class);
    // }

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
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
