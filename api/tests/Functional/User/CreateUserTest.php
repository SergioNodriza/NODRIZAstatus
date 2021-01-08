<?php

namespace App\Tests\Functional\User;

use Symfony\Component\HttpFoundation\JsonResponse;

class CreateUserTest extends UserTestBase
{
    public function testCreateUser(): void
    {
        $name = "PruebaUsuario3";
        $password = "PruebaContraseña2!";
        $rol = "ROLE_EMPRESA_Tuup";

        $payload = [
            "name" => $name,
            "password" => $password,
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
        $name = "PruebaUsuario3";
        $password = "PruebaContraseña2!";
        $rol = "ROLE_EMPRESA_Tuup";

        $payload = [
            "name" => $name,
            "password" => $password,
            "roles" => [$rol]
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
        $name = "PruebaUsuario3";
        $password = "PruebaContraseña2!";
        $rol = "ROLE_EMPRESA_Tuup";

        $payload = [
            "name" => $name,
            "password" => $password,
            "roles" => [$rol]
        ];

        self::$peter->request('POST', sprintf('%s/create', $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame($json['class'], "App\Exceptions\AlreadyExistsException");
        self::assertSame($json['code'], JsonResponse::HTTP_CONFLICT);
        self::assertSame($json['message'], "User PruebaUsuario3 already exist");
    }

    public function testCreateUserPasswordCharsetException(): void
    {
        $name = "PruebaUsuario3";
        $password = [
            "pru",
            "PRUEBACONTRASEÑA",
            "pruebacontraseña",
            "PruebaContraseña",
            "PruebaContraseña2",
        ];
        $rol = "ROLE_EMPRESA_Tuup";

        $errors = [
            "Password must be at least 6 characters",
            "Password must be at least one lowercase",
            "Password must be at least one uppercase",
            "Password must be at least one number",
            "Password must be at least one special character"
        ];

        for ($i = 0 ; $i < 5 ; $i++) {
            $payload = [
                "name" => $name,
                "password" => $password[$i],
                "roles" => [$rol]
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