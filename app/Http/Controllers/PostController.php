<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post.'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post.'],
            ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post.'],
            ['id' => 4, 'title' => 'Fourth Post', 'content' => 'This is the fourth post.'],
            ['id' => 5, 'title' => 'Fifth Post', 'content' => 'This is the fifth post.'],
            ['id' => 6, 'title' => 'Sixth Post', 'content' => 'This is the sixth post.'],
            ['id' => 7, 'title' => 'Seventh Post', 'content' => 'This is the seventh post.'],
            ['id' => 8, 'title' => 'Eighth Post', 'content' => 'This is the eighth post.'],
            ['id' => 9, 'title' => 'Ninth Post', 'content' => 'This is the ninth post.'],
            ['id' => 10,'title' => 'Tenth Post', 'content' => 'This is the tenth post.'],
        ];

        return view('posts.posts', compact('posts'));
    }

    public function show(string $id)
    {
        $posts = [
            ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post.'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post.'],
            ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post.'],
            ['id' => 4, 'title' => 'Fourth Post', 'content' => 'This is the fourth post.'],
            ['id' => 5, 'title' => 'Fifth Post', 'content' => 'This is the fifth post.'],
            ['id' => 6, 'title' => 'Sixth Post', 'content' => 'This is the sixth post.'],
            ['id' => 7, 'title' => 'Seventh Post', 'content' => 'This is the seventh post.'],
            ['id' => 8, 'title' => 'Eighth Post', 'content' => 'This is the eighth post.'],
            ['id' => 9, 'title' => 'Ninth Post', 'content' => 'This is the ninth post.'],
            ['id' => 10,'title' => 'Tenth Post', 'content' => 'This is the tenth post.'],
        ];

        $post = collect($posts)->firstWhere('id', $id);

        return view('posts.details', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        echo "Created Successfully";
        return redirect('/posts');

    }

    public function edit(string $id)
    {
       $posts = [
            ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post.'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post.'],
            ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post.'],
            ['id' => 4, 'title' => 'Fourth Post', 'content' => 'This is the fourth post.'],
            ['id' => 5, 'title' => 'Fifth Post', 'content' => 'This is the fifth post.'],
            ['id' => 6, 'title' => 'Sixth Post', 'content' => 'This is the sixth post.'],
            ['id' => 7, 'title' => 'Seventh Post', 'content' => 'This is the seventh post.'],
            ['id' => 8, 'title' => 'Eighth Post', 'content' => 'This is the eighth post.'],
            ['id' => 9, 'title' => 'Ninth Post', 'content' => 'This is the ninth post.'],
            ['id' => 10,'title' => 'Tenth Post', 'content' => 'This is the tenth post.'],
        ];

        $post = collect($posts)->firstWhere('id', $id);

        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, string $id)
    {
         echo "Updated Successfully";
        return redirect('/posts');
    }


    public function destroy(string $id)
    {
        $posts = [
            ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post.'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post.'],
            ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post.'],
            ['id' => 4, 'title' => 'Fourth Post', 'content' => 'This is the fourth post.'],
            ['id' => 5, 'title' => 'Fifth Post', 'content' => 'This is the fifth post.'],
            ['id' => 6, 'title' => 'Sixth Post', 'content' => 'This is the sixth post.'],
            ['id' => 7, 'title' => 'Seventh Post', 'content' => 'This is the seventh post.'],
            ['id' => 8, 'title' => 'Eighth Post', 'content' => 'This is the eighth post.'],
            ['id' => 9, 'title' => 'Ninth Post', 'content' => 'This is the ninth post.'],
            ['id' => 10,'title' => 'Tenth Post', 'content' => 'This is the tenth post.'],
        ];
        return redirect('/posts');
    }
}
