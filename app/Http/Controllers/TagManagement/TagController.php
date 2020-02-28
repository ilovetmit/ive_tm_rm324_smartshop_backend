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
        return view('TagManagement.Tags.index', compact('tags'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Tag $tag)
    {
        $tag->load('hasProduct', 'hasAdvertisement');
        return view('TagManagement.Tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        
    }

    public function update(Request $request, Tag $tag)
    {
        
    }

    public function destroy(Tag $tag)
    {
        
    }
}
