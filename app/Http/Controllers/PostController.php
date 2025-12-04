<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validCategories = Category::pluck('id')->toArray();
        $idList = implode(',', $validCategories);

        $request->validateWithBag('addPost',[
            'category_id'=> 'required|in:'. $idList,
            'title' => 'required|string|min:3|max:255|not_regex:/[0-9]/',
            'status'=> 'required|in:archived,published',
        ]);

        Post::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('posts.index')->with('success', 'Post data added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validCategories = Category::pluck('id')->toArray();
        $idList = implode(',', $validCategories);

        $request->validateWithBag('addPost',[
            'category'=> 'required|in:'. $idList,
            'title' => 'required|string|min:3|max:255|not_regex:/[0-9]/',
            'status'=> 'required|in:archived,published',
        ]);

        $post->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('posts.index')->with('success', 'Post data updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post data deleted');
    }
}
