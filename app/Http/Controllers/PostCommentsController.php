<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post,CommentRequest $request ){
        $post->comments()->create([
            'user_id'=>auth()->id(), //request()->user()->id also works
            'post_id'=>$post->id,
            'body'=>$request->input('body')
        ]);
        return back();
    }
}
