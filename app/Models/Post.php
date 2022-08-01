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
}
