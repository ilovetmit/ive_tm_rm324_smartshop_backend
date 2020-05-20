<?php

namespace App\Http\Controllers\TagManagement;

use App\Models\TagManagement\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// massDestroy
use App\Http\Requests\MassDestroyTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\AdvertisementManagement\Advertisement;
use App\Models\ProductManagement\Product;
use Symfony\Component\HttpFoundation\Response;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag-management.tags.index', compact('tags'));
    }

    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        $advertisements = Advertisement::all()->pluck('header', 'id');
        return view('tag-management.tags.create', compact('products', 'advertisements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|String|unique:tags',
            'description'   => 'nullable|String',
        ]);
        $tag = Tag::create($request->all());
        $tag->hasProduct()->sync($request->input('products', []));
        $tag->hasAdvertisement()->sync($request->input('advertisements', []));
        return redirect()->route('TagManagement.Tags.index');
    }

    public function show(Tag $tag)
    {
        $tag->load('hasProduct', 'hasAdvertisement');
        return view('tag-management.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $products = Product::all()->pluck('name', 'id');
        $advertisements = Advertisement::all()->pluck('header', 'id');
        return view('tag-management.tags.edit', compact('tag', 'products', 'advertisements'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'          => 'required|String|unique:tags,name' . ($tag->id ? ",$tag->id" : ''),
            'description'   => 'nullable|String',
        ]);
        $tag->update($request->all());
        $tag->hasProduct()->sync($request->input('products', []));
        $tag->hasAdvertisement()->sync($request->input('advertisements', []));
        return redirect()->route('TagManagement.Tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }

    public function massDestroy(MassDestroyTagRequest $request)
    {
        Tag::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
