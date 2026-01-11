<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Gallery;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $galleries = Gallery::all();

        $photos = Photo::with('gallery') // eager load gallery
            ->when($request->gallery_id, function($query, $gallery_id) {
                return $query->where('gallery_id', $gallery_id);
            })
            ->get();

        return view('photos.index', compact('photos', 'galleries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galleries = Gallery::all();
        return view('photos.create', compact('galleries'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'file_path' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'gallery_id' => 'required|exists:galleries,id',
            'title' => 'nullable|string|max:255',
        ]);

        // Simpan file
        $path = $request->file('file_path')->store('photos', 'public');

        // Simpan ke database
        Photo::create([
            'gallery_id' => $request->gallery_id,
            'file_path' => $path,
            'title' => $request->title,
        ]);

        return redirect()->route('photos.index')->with('success', 'Photo successfully added.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
