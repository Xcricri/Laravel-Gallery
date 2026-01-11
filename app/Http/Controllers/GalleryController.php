<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua gallery terbaru, paginate 10 per halaman
        $galleries = Gallery::latest()->paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all(); // Bisa untuk select post saat create
        return view('galleries.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|min:3|max:255|not_regex:/[0-9]/',
            'cover' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required|in:active,inactive',
            'position' => 'required|in:1,2',
            'post' => 'required|exists:posts,id',
            'description' => 'nullapble|string|max:255',
        ]);

        // Upload cover image
        $imagePath = $request->file('cover')->store('uploads/cover', 'public');

        // Simpan ke database
        Gallery::create([
            'title' => $request->title,
            'cover' => $imagePath,
            'status' => $request->status,
            'post_id' => $request->post,
            'position' => $request->position,
            'description' => $request->description,
        ]);

        return redirect()->route('galleries.index')->with('success', 'Gallery successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $posts = Post::all();
        return view('galleries.edit', compact('gallery', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        // Validasi update
        $request->validate([
            'title' => 'required|string|min:3|max:255|not_regex:/[0-9]/',
            'cover' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'position' => 'required|in:1,2',
            'post' => 'required|exists:posts,id',
            'description' => 'nullable|string|max:255',
        ]);

        // Update cover jika ada file baru
        if($request->hasFile('cover')){
            // Hapus file lama jika ada
            if($gallery->cover && Storage::disk('public')->exists($gallery->cover)){
                Storage::disk('public')->delete($gallery->cover);
            }

            $imagePath = $request->file('cover')->store('uploads/cover', 'public');
            $gallery->cover = $imagePath;
        }

        // Update data lain
        $gallery->title = $request->title;
        $gallery->status = $request->status;
        $gallery->position = $request->position;
        $gallery->post_id = $request->post;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gallery successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus file cover
        if($gallery->cover && Storage::disk('public')->exists($gallery->cover)){
            Storage::disk('public')->delete($gallery->cover);
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery successfully deleted.');
    }
}
