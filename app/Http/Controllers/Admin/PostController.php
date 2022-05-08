<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    protected function validator($data)
    {
        return Validator::make($data, [
            'title'=>'required|max:255|',
            'image'=>'image|max:2048',
            'content'=>'required'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|max:255|unique:posts',
            'image'=>'required|image|max:2048',
            'content'=>'required'
        ]);

        if(isset($data['image']))
        {
            $path = $request->file('image')->store('images/photos');
            $data['image'] = $path;
        }

        $data = Arr::add($data,'date', now());

        if(Auth::check() == null){
            $data = Arr::add($data,'author', 'Anonym');
        }
        else{
            $data = Arr::add($data,'author', 'Auth::user()->name');
        }

        $post = Post::create($data);

        session()->flash('message', 'Post created!');
        return redirect(route('posts/single', $post->slug));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->validator($request->all())->validate();

        if(isset($data['image']))
        {
            $path = $request->file('image')->store('images/photos');
            $data['image'] = $path;
        }

        $post->update($data);

        if(isset($data['image']))
        {
            Storage::delete($oldImage);
        }

        session()->flash('message', 'Post updated!');
        return redirect(route('posts/single', $post->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Storage::delete($post->image);

        session()->flash('message', 'Post deleted!');
        return redirect('/');
    }
}
