<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post){

        request()->validate([
            'content'=>'required'
        ]);

        $post->comments()->create([
            'user_id' => Auth()->user()->id,
            'post_id' => $post->id,
            'date' => now(),
            'content' => request('content')
        ]);



        return back();
    }
}
