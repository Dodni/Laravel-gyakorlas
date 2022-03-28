<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
            /*
    $posts = array_map(function ($file) {
        $document = YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }, $files);
    */

    /*
    Egyszerubben és szebben is meglehet valositani
    $posts = [];
    foreach ($files as $file) {
        $document = YamlFrontMatter::parseFile($file);

        $posts[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    return view('posts', [
        'posts' => $posts
    ]);
    }


     */

    /*
        $document =  YamlFrontMatter::parseFile(
        resource_path('posts/my-fourth-post.html')
    );

        return view('posts', [
        'posts' => Post::all()
    ]);

    dd($document);
    dd($document->matter('title'));
    dd($document->body());
    dd($document->title);
    dd($document->excerpt);
    dd($document->date);
    */

});

Route::get('posts/{post}', function ($slug){
    // Find a post by its slug and pass it to a view called "post"
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);
    /*

    */
})->where('post','[A-z_\-]+');


