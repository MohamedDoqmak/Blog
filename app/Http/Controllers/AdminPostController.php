<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest as PostStorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(PostStorePostRequest $request)
    {
        $attributes = $request->validated();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $attributes = $request->validated();

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','Post Deleted');
    }
}
