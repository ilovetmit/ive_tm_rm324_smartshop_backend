<?php

namespace App\Http\Controllers\AdvertisementManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvertisementManagement\Advertisement;
use App\Models\TagManagement\Tag;
// massDestroy
use App\Http\Requests\MassDestroyAdvertisementRequest;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use Symfony\Component\HttpFoundation\Response;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('advertisement-management.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        $tags = Tag::all()->pluck('name', 'id');
        return view('advertisement-management.advertisements.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (isset($request->image)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('image')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('image')->store('public/ad/ad');
                $data['image'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $advertisement = Advertisement::create($data);
        $advertisement->hasTag()->sync($request->input('tags', []));
        return redirect()->route('AdvertisementManagement.ad.index');
    }

    public function show(Advertisement $ad)
    {
        $ad->load('hasTag');
        return view('advertisement-management.advertisements.show', compact('ad'));
    }

    public function edit(Advertisement $ad)
    {
        $tags = Tag::all()->pluck('name', 'id');
        $ad->load('hasTag');
        return view('advertisement-management.advertisements.edit', compact('ad', 'tags'));
    }

    public function update(Request $request, Advertisement $ad)
    {
        $data = $request->all();
        if (isset($request->image)) {
            $photoTypes = array('png', 'jpg', 'jpeg');
            $extension = $request->file('image')->getClientOriginalExtension();
            $isInFileType = in_array($extension, $photoTypes);

            if ($isInFileType) {
                $file = $request->file('image')->store('public/ad/ad');
                $data['image'] = basename($file);
            } else {
                return back()->withErrors('Create Fail, Image type error, only png, jpg, jpeg');
            }
        }
        $ad->update($data);
        $ad->hasTag()->sync($request->input('tags', []));
        return redirect()->route('AdvertisementManagement.ad.index');
    }

    public function destroy(Advertisement $ad)
    {
        $ad->delete();
        return back();
    }

    public function massDestroy(MassDestroyAdvertisementRequest $request)
    {
        Advertisement::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
