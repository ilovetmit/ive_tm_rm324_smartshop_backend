<?php

namespace App\Http\Controllers\ProductManagement;

use App\Models\ProductManagement\Category;
use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('product-management.categories.index', compact('categories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('product-management.categories.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:categories',
            'description'   => 'nullable',
            'products'      => 'required',
        ]);
        $category = Category::create($request->all());
        $category->hasProduct()->sync($request->input('products', []));
        return redirect()->route('ProductManagement.Categories.index');
    }

    public function show(Category $category)
    {
        $category->load('hasProduct');
        return view('product-management.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $products = Product::all()->pluck('name', 'id');
        $category->load('hasProduct');
        return view('product-management.categories.edit', compact('category', 'products'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'          => 'required|unique:categories,name' . ($category->id ? ",$category->id" : ''),
            'description'   => 'nullable',
            'products'      => 'required',
        ]);
        $category->update($request->all());
        $category->hasProduct()->sync($request->input('products', []));
        return redirect()->route('ProductManagement.Categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
