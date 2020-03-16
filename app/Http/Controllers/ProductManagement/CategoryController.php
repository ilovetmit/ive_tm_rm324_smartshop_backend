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
        // $products = Product::all()->pluck('name', 'id');
        return view('product-management.categories.create', compact('products'));
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        // $category->hasProduct()->sync($request->input('product', []));
        return redirect()->route('ProductManagement.Categories.index');
    }

    public function show(Category $category)
    {
        $category->load('hasProduct');
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
    
    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
