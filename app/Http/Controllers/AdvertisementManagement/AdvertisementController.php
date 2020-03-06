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
        $advertisements = Advertisement::all()->pluck('id');
        return view('advertisement-management.advertisements.create', compact('advertisements'));
    }

    public function store(Request $request)
    {
        $advertisement = Advertisement::create($request->all());
        // $advertisement->roles()->sync($request->input('roles', []));
        return redirect()->route('AdvertisementManagement.Advertisements.index');
    }

    public function show(Advertisement $advertisement)
    {
        $advertisement->load('hasTag');
        return view('advertisement-management.advertisements.show', compact('advertisement'));
    }

    public function edit(Advertisement $advertisement)
    {
        $tag = Tag::all()->pluck('id');
        $advertisement->load('hasTag');
        return view('advertisement-management.advertisements.edit', compact('advertisement', 'tag'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $advertisement->update($request->all());
        // $user->roles()->sync($request->input('roles', []));
        return redirect()->route('AdvertisementManagement.Advertisements.index');
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return back();
    }
    
    public function massDestroy(MassDestroyAdvertisementRequest $request)
    {
        Advertisement::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
