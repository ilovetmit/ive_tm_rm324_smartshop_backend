<?php

namespace App\Http\Controllers\ProductManagement;

use App\Models\ProductManagement\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('ProductManagement.Category.index', compact('categories'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Category $category)
    {
        
    }

    public function edit(Category $category)
    {
        
    }

    public function update(Request $request, Category $category)
    {
        
    }

    public function destroy(Category $category)
    {
        
    }
}
