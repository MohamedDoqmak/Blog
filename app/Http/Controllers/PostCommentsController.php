<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post){
        request()->validate([
            'body'=>'required'
        ]);

        $post->comments()->create([
            'user_id'=>auth()->id(), //request()->user()->id also works
            'post_id'=>$post->id,
            'body'=>request('body')
        ]);
        return back();
    }
}
