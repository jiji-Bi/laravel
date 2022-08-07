<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'author'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    //a category is the parent model : a post is a child model 
    // -->to represent the inverse of a has many relationship :
    //- define a relationship belongs to inside the child  
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //to respect srp we are going to refactor this 
    //     public function scopeFilter($query) // Post::newQuery()->filter()
    //     {
    //         if (request('search')) {
    //             $query->where('title', 'like', '%' . request('search') . '%')
    //                 ->orwhere('body', 'like', '%' . request('search') . '%')
    //                 ->orwhere('excerpt', 'like', '%' . request('search') . '%');
    //         }
    //     }

    //   query scope 
    public function scopefilter($query, array $filters) // Post::newQuery()->filter()
    {
        if (isset($filters['search'])) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('body', 'like', '%' . request('search') . '%')
                ->orwhere('excerpt', 'like', '%' . request('search') . '%');
        }
    }
}
