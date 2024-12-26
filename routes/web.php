<?php

use App\Contracts\ApiInstagramInterface;
use App\Contracts\CalculateInterface;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (CalculateInterface $calculate) {
    $calculate->add(1,2);
});


Route::get('/instagram/profile/{username}', function (string $username, ApiInstagramInterface $apiInstagram) {
    $user = $apiInstagram->getProfile($username);

    return [
        'username' => $user->name,
        'bio' => $user->bio,
        'avatarLink' => $user->avatarLink,
    ];
});
