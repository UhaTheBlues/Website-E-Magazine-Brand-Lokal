<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('user.category', [
            'title' => $category->name,
            // 'posts'=>  $category->posts->load('category'), //Lazy Eager Loading "->load('category')"
            'posts'=>  $category->posts,
            'category' =>$category->name
         ]);
    }
}
