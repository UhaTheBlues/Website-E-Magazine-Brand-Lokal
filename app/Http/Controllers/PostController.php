<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        return view('user.index', [
           "title" => "$title",
        // "posts" => Post::all() //Sort berdasarkan ID
           "posts" => Post::latest()->filter(request(['search', 'category']))->paginate(3)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('user.post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
    
}
