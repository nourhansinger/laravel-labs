<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\User;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $trashedCount = Post::onlyTrashed()->count();

        return view('posts.posts', compact('posts', 'trashedCount'));
    }

    public function restoreAll()
    {
        Post::onlyTrashed()->restore();

        return redirect('/posts')->with('status', 'All deleted posts have been restored.');
    }

    public function show(string $id)
    {
        $post= Post::find($id);
        return view('posts.details', compact('post'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));

    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/posts');

    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        $users =User::all();
        return view('posts.edit', compact('post','users'));
    }


    public function update(StorePostRequest $request, string $id)
    {
        // $request->validate([
        //     'title' => 'required|min:3',
        //     'content' => 'required|min:10',
        //     'user_id' => 'required|exists:users,id'
        // ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        $post->save();

        return redirect('/posts');
    }


    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
