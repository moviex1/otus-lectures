<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return \App\Models\Post::search('title:record')->get();
});

Route::get('post/{post}', function (\App\Models\Post $post) {
    return $post;
});

Route::get('/test-1', function () {
    return \App\Models\Post::create([
        'title' => 'new record 2',
        'content' => 'asdfasdf',
    ]);
});
