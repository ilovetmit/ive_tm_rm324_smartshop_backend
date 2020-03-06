<?php

namespace App\Http\Controllers\TagManagement;

use App\Models\TagManagement\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag-management.tags.index', compact('tags'));
    }

    public function create()
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        return view('tag-management.tags.create');
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        // $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('TagManagement.Tags.index');
    }

    public function show(Tag $tag)
    {
        // $tag->load('hasProduct', 'hasAdvertisement');
        return view('tag-management.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        // $role->load('hasPermission');
        return view('tag-management.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        // $tag->hasPermission()->sync($request->input('permissions', []));
        return redirect()->route('TagManagement.Tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }
}
