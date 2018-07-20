<?php

namespace App\Http\Controllers\Album\Front;

use App\Album;
use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Cache::remember('_front_albums', 1, function () {
            return Album::latest()->paginate(10);
        });

        return view('album.front.index', compact('albums'));
    }

    public function show($id)
    {
        $album = Album::with('galleries')->findOrFail($id);

        return view('album.front.show', compact('album'));
    }
}
