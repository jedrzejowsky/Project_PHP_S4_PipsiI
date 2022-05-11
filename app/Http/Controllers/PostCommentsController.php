<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostCommentsController extends Controller
{
    protected function validator($data)
    {
        return Validator::make($data, [
            'content'=>'required',
        ]);
    }

    public function store(Post $post){

        request()->validate([
            'content'=>'required'
        ]);
       // dd($post);
        $post->comments()->create([
            'user_id' => Auth()->user()->id,
            'post_id' => $post->id,
            'date' => now(),
            'content' => request('content')
        ]);

        Log::channel('customLog')->info('Add new comment in post ',['id' =>$post->id]);

        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::where('id',$id)->first();
        Log::channel('customLog')->info('Delete comment in post '.$id);
        $comment->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $comment = Comment::where('id',$id)->first();
        Log::channel('customLog')->info('Editing comment in post '.$id);
        return view('admin.comment.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $this->validator($request->all())->validate();
        Log::channel('customLog')->info('Update comment in post '.$id);
        $comment->content = $request->content;
        $comment->save();

        session()->flash('message', 'Comment updated!');
        return redirect(route('posts/single', $comment->post->slug));
    }
}
