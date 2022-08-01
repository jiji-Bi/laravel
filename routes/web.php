<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// //dirtycode
// Route::get('/', function () {
//     $files = Post::all();
//     $posts = [];
//     foreach ($files as $file) {
//         $documents = YamlFrontMatter::parseFile($file);
//         $posts[] = new Post(
//             $documents->title,
//             $documents->excerpt,
//             $documents->body(),
//             $documents->date,
//             $documents->slug
//         );
//     }
//     return view('posts', ['posts' => $posts]);
// });

//cleancode (method1)
// Route::get('/', function () {
//     $files = Post::all();
//     $posts = array_map(function ($file) {
//         $document = YamlFrontMatter::parseFile($file);
//         return new Post(
//             $document->title,
//             $document->excerpt,
//             $document->body(),
//             $document->date,
//             $document->slug
//         );
//     }, $files);
//     return view('posts', ['posts' => $posts]);
// });

//laravel's collections 
Route::get('/', function () {
    return view('posts', ['posts' => Post::latest('created_at')->get()]);
});

Route::get("posts/{post:slug}", function (Post $post) {
    // Post::where('slug',$post)
    return view('post', ['post' => $post]);
}); //->where('post', '[0-9A-z]+');

Route::get("categories/{category:slug}", function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});

Route::get("authors/{author:name}", function (User $author) {
    return view('posts', ['posts' => $author->posts]);
});