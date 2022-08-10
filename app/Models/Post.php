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
        // if (isset($filters['search'])) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orwhere('body', 'like', '%' . request('search') . '%')
        //         ->orwhere('excerpt', 'like', '%' . request('search') . '%');
        // }

        //--------------Null coalescing operator-------------------------------
        $query->when($filters['search'] ?? false, function ($query, $search) {
            //dd(request(['search']), $search);
            $query->where(function ($query) use ($search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orwhere('body', 'like', '%' . $search . '%')
                    ->orwhere('excerpt', 'like', '%' . $search . '%');
            });
        });

        $query->when(
            $filters['category'] ?? false,
            function ($query, $category) {
                $query
                    ->whereExists(
                        function ($query) use ($category) {
                            $query->from('categories')
                                ->whereColumn('categories.id', 'posts.category_id')
                                //we specfiy the query keyword in the url 
                                ->where('categories.slug', $category);
                        }
                    );
            }
        );
        $query->when(
            $filters['author'] ?? false,
            function ($query, $author) {
                $query
                    ->whereExists(
                        function ($query) use ($author) {
                            $query->from('users')
                                ->whereColumn('users.id', 'posts.user_id')
                                ->where('users.name', $author);
                        }
                    );
            }
        );
        // ->where('title', 'like', '%' . $category . '%')
        // ->orwhere('body', 'like', '%' . $category . '%')
        // ->orwhere('excerpt', 'like', '%' . $category . '%');

        //dd(request(['search']), $search);           
    }
}
