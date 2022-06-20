<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['category']; // Menggunakan Eager Loading utk menghindari N + 1

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    //Buat Searching Postingan
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%');
        });

        //Versi Use Function
        // $query->when($filters['category'] ?? false, function($query, $category){
        //     return $query->whereHas('category', function($query) use ($category){
        //         $query->where('slug', $category);
        //     });
        // });

        //Versi Arrow Function
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
