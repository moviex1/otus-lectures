<?php

declare(strict_types=1);

namespace App\Services\Instagram;

use App\Contracts\ApiInstagramInterface;
use App\DTO\InstagramResponseDTO;

final readonly class SecondInstagramApi implements ApiInstagramInterface
{

    public function getProfile(string $name): InstagramResponseDTO
    {
        //Делаем запрос в сторонний сервис и получаем ответ
        $response = [
            'userInfo' => [
                'name' => 'User',
                'bio' => 'Info about user',
            ],
            'avatarInfo' => [
                'link' => 'https://api.instagram.com/photo/1',
                'width' => 920,
                'height' => 480,
            ],
        ];

        return new InstagramResponseDTO(
            name: $response['userInfo']['name'],
            avatarLink: $response['avatarInfo']['link'],
            bio: $response['userInfo']['bio'],
        );
    }
}
