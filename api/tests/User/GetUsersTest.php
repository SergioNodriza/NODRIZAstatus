<?php


namespace App\Tests\User;


use Symfony\Component\HttpFoundation\JsonResponse;

class GetUsersTest extends UserTestBase
{
    public function testGetUsers(): void
    {
        self::$peter->request('GET', $this->endpoint, [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "hydra:Collection");
        self::assertIsArray($json['hydra:member']);
    }

    public function testGetUsersNoPermissions(): void
    {
        self::$brian->request('GET', $this->endpoint, [], [], [], null);
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not get the Users");
    }
}