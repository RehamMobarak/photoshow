<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{

    public function create(int $albumId)
    {
        return view('photos.create')->with("albumId", $albumId);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            "title" => 'required',
            "description" => 'required',
            "photo" => 'required|image',
        ]);

        // storing cover image name with seconds timestamp
        $fileNameWithExtention = $request->file('photo')->getClientOriginalName();
        $extention = $request->file('photo')->getClientOriginalExtension();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileNameToStore = $fileName . "_" . time() . "." . $extention;

        // storing the actual image
        $request->file('photo')->storeAs('public/albums/'.$request->input('albumId'), $fileNameToStore);

        // storing the new photo data
        $photo = new photo();
        $photo->album_id = $request->input('albumId');

        $photo->photoname = $fileNameToStore;
        $photo->title = $request->input('title');
        $photo->size = $request->file('photo')->getSize();
        $photo->description = $request->input('description');
        $photo->save();

        return redirect('/')->with('success', 'photo uploaded successfully ! ');
    }

    // public function show($id)
    // {
    //     $photo = photo::with('photos')->find($id);
    //     return view('photos.show')->with('photo', $photo);
    // }
}
