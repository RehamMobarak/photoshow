<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "description" => 'required',
            "cover-image" => 'required|image',
        ]);

        // storing cover image name with seconds timestamp
        $fileNameWithExtention = $request->file('cover-image')->getClientOriginalName();
        $extention = $request->file('cover-image')->getClientOriginalExtension();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileNameToStore = $fileName . "_" . time() . "." . $extention;

        // storing the actual image
        $request->file('cover-image')->storeAs('public/cover_images', $fileNameToStore);
        //* remember to run: (php artisan storage:link) to save imgs in public folder which is more safe than storing it at (storage/app/public/)

        // storing the new album data
        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;
        $album->save();

        return redirect("/albums")->with('success', 'album created successfully ! ');
    }

    public function show($id)
    {
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album', $album);
    }
}
