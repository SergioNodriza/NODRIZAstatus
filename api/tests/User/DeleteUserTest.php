<?php

namespace App\Tests\User;

use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteUserTest extends UserTestBase
{
    public function testDeleteUser(): void
    {
        self::$peter->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getBrianId()), [], [], [], null);
        $response = self::$peter->getResponse();

        self::assertSame(JsonResponse::HTTP_NO_CONTENT, $response->getStatusCode());
    }

    public function testDeleteUserNoPermissions(): void
    {
        self::$brian->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getBrianId()), [], [], [], null);
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not delete an User");
    }
}