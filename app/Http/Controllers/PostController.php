<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index()
    {

        return view(
            'posts',
            [
                'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->Simplepaginate('6'),
                // 'categories' => Category::all(),
                'currentCategory' => Category::firstWhere('slug', request('category'))
            ]
        );
    }

    public function show(Post $post)
    {
        // Post::where('slug',$post)
        return view('post', ['post' => $post, /*'categories' => Category::all()*/]);
    }
}
