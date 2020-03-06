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
        return view('product-management.categories.index', compact('categories'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('product-management.categories.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        // $category->permissions()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.Categories.index');
    }

    public function show(Category $category)
    {
        // $product->load('hasTransaction');
        return view('product-management.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $product->load('hasTransaction');
        return view('product-management.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        // $remittanceTransaction->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('ProductManagement.Categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
