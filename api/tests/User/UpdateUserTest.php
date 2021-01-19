<?php

namespace App\Tests\User;

use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateUserTest extends UserTestBase
{
    public function testUpdateUser(): void
    {
        $name = "TestUsuario2";
        $rol = "ROLE_EMPRESA";

        $payload = [
            "name" => $name,
            "password" => "TestContraseña1!",
            "roles" => [$rol]
        ];

        self::$peter->request('PUT', sprintf('%s/%s', $this->endpoint, $this->getPeterId()), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "User");
        self::assertSame($json['name'], $name);
        self::assertSame($json['roles'][0], $rol);
    }

    public function testUpdateUserNoPermissions(): void
    {
        $payload = [
            "name" => "TestUsuario2",
            "password" => "TestContraseña1!",
            "roles" => [
                "ROLE_EMPRESA"
            ]
        ];

        self::$brian->request('PUT', sprintf('%s/%s', $this->endpoint, $this->getPeterId()), [], [], [], json_encode($payload));
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not update an User");
    }
}