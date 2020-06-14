<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('categories');

    }
    public function show()
    {
        $categories = Category::all();
        return ($categories);
    }
    public function store(Request $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
    }
    public function edit(Category $category, Request $request)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
    }
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
