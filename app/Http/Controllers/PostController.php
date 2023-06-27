<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;



class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'caption' => ['required', 'max:300'],
            'image' => 'required',
        ]);


        $post = Post::create([
            'caption' => $request->caption,
            'user_id' => Auth::user()->id,

        ]);

        $post->addMedia($request->image)->toMediaCollection('image');

        return redirect()->route('post.show');
    }

    public function show(Post $post)
    {
        $posts = Post::with('user')->with('media')->orderBy('created_at', 'desc')->get();
        return view('posts.show', compact('posts'));
    }


    public function update(Request $request, Post $post)
    {

        //$this->authorize('edit_post');
        $request->validate([
            'caption' => ['required', 'max:300'],
        ]);

        $post->user_id = Auth::user()->id;
        $post->update($request->all());
        Toastr::success('Post Updated!', 'Success');
        return redirect()->route('post.show');
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $post = Post::where('id', $id)->firstOrFail();
        $post->delete();
        Toastr::success('Post deleted!!', 'Success');
        return redirect()->route('post.show');
    }







    public function feed()
    {
        return view('posts.feed');
    }
}
