<?php

use App\Contracts\ApiInstagramInterface;
use App\Contracts\CalculateInterface;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (\App\Services\CalculateService $calculate) {
    return [
        'result' => $calculate->add(4,2)
    ];

});























Route::get('/instagram/profile/{username}', function (string $username, ApiInstagramInterface $apiInstagram, \Psr\SimpleCache\CacheInterface $cache) {
    $user = $apiInstagram->getProfile($username);

    return [
        'username' => $user->name,
        'bio' => $user->bio,
        'avatarLink' => $user->avatarLink,
    ];
});
