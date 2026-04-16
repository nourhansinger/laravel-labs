<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
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
        $post = Post::with('comments')->findOrFail($id);

        return view('posts.details', compact('post'));
    }

    public function storeComment(StoreCommentRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->create($request->validated());

        return redirect()->back()->with('status', 'Comment added successfully.');
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', compact('users'));
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect('/posts');
    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        $users = User::all();

        return view('posts.edit', compact('post', 'users'));
    }

    public function update(StorePostRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect('/posts');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect('/posts');
    }
}
