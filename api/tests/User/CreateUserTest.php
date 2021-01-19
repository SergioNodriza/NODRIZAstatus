<?php

namespace App\Tests\User;

use Symfony\Component\HttpFoundation\JsonResponse;

class CreateUserTest extends UserTestBase
{
    public function testCreateUser(): void
    {
        $name = "TestUsuario";
        $rol = "ROLE_EMPRESA";

        $payload = [
            "name" => $name,
            "password" => "TestContraseña1!",
            "roles" => [$rol]
        ];

        self::$peter->request('POST', sprintf('%s/create', $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_CREATED, $response->getStatusCode());
        self::assertSame($json['@type'], "User");
        self::assertSame($json['name'], $name);
        self::assertSame($json['roles'][0], $rol);
    }

    public function testCreateUserNoPermissions(): void
    {
        $payload = [
            "name" => "TestUsuario",
            "password" => "TestContraseña1!",
            "roles" => [
                "ROLE_EMPRESA"
            ]
        ];

        self::$brian->request('POST', sprintf('%s/create', $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], 'Wrong Permissions, You can not register an User');
    }

    public function testCreateUserAlreadyExists(): void
    {
        $name = "TestUsuario";
        $payload = [
            "name" => $name,
            "password" => "TestContraseña1!",
            "roles" => [
                "ROLE_EMPRESA"
            ]
        ];

        self::$peter->request('POST', sprintf('%s/create', $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame($json['class'], "App\Exceptions\AlreadyExistsException");
        self::assertSame($json['code'], JsonResponse::HTTP_CONFLICT);
        self::assertSame($json['message'], sprintf("User %s already exist", $name));
    }

    public function testCreateUserPasswordCharsetException(): void
    {
        $password = [
            "pru",
            "PRUEBACONTRASEÑA",
            "pruebacontraseña",
            "PruebaContraseña",
            "PruebaContraseña2",
        ];

        $errors = [
            "Password must be at least 6 characters",
            "Password must be at least one lowercase",
            "Password must be at least one uppercase",
            "Password must be at least one number",
            "Password must be at least one special character"
        ];

        for ($i = 0 ; $i < 5 ; $i++) {
            $payload = [
                "name" => "TestUsuario" . $i,
                "password" => $password[$i],
                "roles" => [
                    "ROLE_EMPRESA"
                ]
            ];

            self::$peter->request('POST', sprintf('%s/create', $this->endpoint), [], [], [], json_encode($payload));
            $response = self::$peter->getResponse();
            $json = json_decode($response->getContent(), true);

            self::assertSame($json['class'], "Symfony\Component\HttpKernel\Exception\BadRequestHttpException");
            self::assertSame($json['code'], JsonResponse::HTTP_BAD_REQUEST);
            self::assertSame($json['message'], $errors[$i]);
        }
    }
}