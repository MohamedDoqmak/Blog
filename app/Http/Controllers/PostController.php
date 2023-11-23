<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->
                filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString()
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(StorepostRequest $request)
    {
        $attributes = $request->validated();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/');
    }



}
