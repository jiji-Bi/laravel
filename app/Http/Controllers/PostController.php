<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        return view(
            'posts',
            [
                'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate('6'),
                // 'categories' => Category::all(),
                'currentCategory' => Category::firstWhere('slug', request('category'))
            ]
        );
    }
    // public function getPosts()
    // {
    //     //request(['search'])is the secong argument passed to my controller for getpossts method beacause the first one is automatically passed by laravel
    //     // called the query builder 
    //     return Post::latest()->filter(request(['search']))->get();
    // }
    public function show(Post $post)
    {
        // Post::where('slug',$post)
        return view('post', ['post' => $post, /*'categories' => Category::all()*/]);
    }
}
