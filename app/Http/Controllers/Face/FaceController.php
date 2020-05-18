<?php

namespace App\Http\Controllers\Face;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class FaceController extends Controller
{
    public function index()
    {
        return view('user-panel.face-recognition.index');
    }
}
