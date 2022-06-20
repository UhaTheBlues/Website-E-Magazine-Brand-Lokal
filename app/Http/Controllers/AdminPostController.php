<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    
    public function index()
    {
        return view ('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    // Create
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

   // Menjalankan Proses Create
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'author' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        // Data ditambahkan harus setelah validasi diatas lolos
        $validatedData['image'] = $request->file('image')->store('gambar-postingan');
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        //Menambahkan data yang sudah di validasi
        Post::create($validatedData);

        return redirect('/admin/posts')->with('success', 'Postingan Berhasil Ditambahkan !');
    }

    // View
    public function show(Post $post)
    {
       return view('admin.posts.show', [
           'post' => $post
       ]);
    }

    // Edit
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,

            'categories' => Category::all()
        ]);
    }

    // Menjalankan Proses Edit
    public function update(Request $request, Post $post)
    {
        // Agar slug dapat duplikat dibuat rules
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'author' => 'required',
            'image' => 'required|image|file|max:1024'
        ];
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);
        
        //If untuk delete image yang lama
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        // Data ditambahkan harus setelah validasi diatas lolos
        $validatedData['image'] = $request->file('image')->store('gambar-postingan');

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        //Mengedit data yang sudah di validasi
        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/admin/posts')->with('success', 'Postingan Berhasil Diedit !');
    }

   //Delete
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/admin/posts')->with('success', 'Postingan Berhasil Dihapus !');
    }
}
