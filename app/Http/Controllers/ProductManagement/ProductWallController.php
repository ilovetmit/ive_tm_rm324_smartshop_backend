<?php

namespace App\Http\Controllers\ProductManagement;

use App\Models\ProductManagement\ProductWall;
use App\Models\ProductManagement\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyProductWallRequest;
use App\Http\Requests\StoreProductWallRequest;
use App\Http\Requests\UpdateProductWallRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductWallController extends Controller
{
    public function index()
    {
        $productWalls = ProductWall::all();
        return view('product-management.product-walls.index', compact('productWalls'));
    }

    public function create()
    {
        $products = Product::all();
        return view('product-management.product-walls.create', compact('products'));
    }

    public function store(Request $request)
    {
        $messages = [
            'qrcode.regex' => 'The qrcode format should start with "wall-"',
        ];

        $request->validate([
            'qrcode'        => 'required|regex:((wall-)([0-9]){3})|unique:product_walls',
            'product_id'    => 'required',
            'message'       => 'nullable',
        ], $messages);
        
        $data = $request->all();
        $productWall = ProductWall::create($data);
        return redirect()->route('ProductManagement.ProductWalls.index');
    }

    public function show(ProductWall $productWall)
    {
        $productWall->load('hasProduct');
        return view('product-management.product-walls.show', compact('productWall'));
    }

    public function edit(ProductWall $productWall)
    {
        // $transactions = Transaction::all()->pluck('id');
        // $product->load('hasTransaction');
        $products = Product::all();
        return view('product-management.product-walls.edit', compact('productWall', 'products'));
    }

    public function update(Request $request, ProductWall $productWall)
    {
        $messages = [
            'qrcode.regex' => 'The qrcode format should start with "wall-"',
        ];

        $request->validate([
            'qrcode'        => 'required|regex:((wall-)([0-9]){3})|unique:product_walls,qrcode' . ($productWall->id ? ",$productWall->id" : ''),
            'product_id'    => 'required',
            'message'       => 'nullable',
        ], $messages);
        
        $data = $request->all();
        $productWall->update($data);
        return redirect()->route('ProductManagement.ProductWalls.index');
    }

    public function destroy(ProductWall $productWall)
    {
        $productWall->delete();
        return back();
    }

    public function massDestroy(MassDestroyProductWallRequest $request)
    {
        ProductWall::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
