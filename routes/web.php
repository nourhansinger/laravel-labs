<?php

use Illuminate\Support\Facades\Route;


$posts = [
        ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post.'],
        ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post.'],
        ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post.'],
    ];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/create', function () {
    return view('posts.create');
});


Route::get('/home', function ()  use ($posts) {
    return view('posts.home', compact('posts'));
});

Route::get('/post/{id}', function ($id) use ($posts){
    $post = collect($posts)->firstWhere('id', $id);
    return view('posts.details', compact('post'));
});

Route ::post('/post/create', function () use (&$posts) {

    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    $posts[] = [
        'id' => count($posts) + 1,
        'title' => $title,
        'content' => $content,
    ];
    return 'Post created successfully!' . '<br><br><a href="/home">Back to Home</a>';
});


