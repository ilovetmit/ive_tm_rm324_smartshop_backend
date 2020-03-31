<?php

namespace App\Http\Controllers\ProductManagement;

use App\Models\ProductManagement\Product;
use App\Models\ProductManagement\Category;
use App\Models\TagManagement\Tag;
use App\Models\TransactionManagement\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product-management.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view('product-management.products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (isset($request->image)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('image')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('image')->store('public/products/image');
                $data['image'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $product = Product::create($data);
        $product->hasCategory()->sync($request->input('categories', []));
        $product->hasTag()->sync($request->input('tags', []));
        return redirect()->route('ProductManagement.Products.index');
    }

    public function show(Product $product)
    {
        $product->load('hasProductTransaction', 'hasTag', 'hasCategory');
        return view('product-management.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // $transactions = Transaction::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view('product-management.products.edit', compact('product', 'tags', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        if (isset($request->image)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('image')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('image')->store('public/products/image');
                $data['image'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $product->update($data);
        $product->hasCategory()->sync($request->input('categories', []));
        $product->hasTag()->sync($request->input('tags', []));
        return redirect()->route('ProductManagement.Products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
