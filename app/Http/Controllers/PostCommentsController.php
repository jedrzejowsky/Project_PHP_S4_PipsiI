<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        Log::channel('customLog')->info("Add new comment in post id=$post->id");

        return back();
    }
}
