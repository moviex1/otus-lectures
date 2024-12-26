<?php

declare(strict_types=1);

namespace App\Services\Instagram;

use App\Contracts\ApiInstagramInterface;
use App\DTO\InstagramResponseDTO;

final readonly class FirstInstagramApi implements ApiInstagramInterface
{

    public function getProfile(string $name): InstagramResponseDTO
    {
        //Делаем запрос в сторонний сервис и получаем ответ
        $response = [
            'username' => 'User',
            'bio_info' => 'Info about user',
            'pfp_url' => 'https://api.instagram.com/photo/1',
        ];

        return new InstagramResponseDTO(
            name: $response['username'],
            avatarLink: $response['pfp_url'],
            bio: $response['bio_info'],
        );
    }
}
