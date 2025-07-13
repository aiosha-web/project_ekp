<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('video.home', compact('categories'));
    }
    public function show($id)
    {
        $category = Category::with('videos')->findOrFail($id);
        return view('categories.show', compact('category'));
    }
}
