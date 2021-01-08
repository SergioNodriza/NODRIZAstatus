<?php


namespace App\Tests\Functional\User;


use Symfony\Component\HttpFoundation\JsonResponse;

class GetUserTest extends UserTestBase
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

    public function testGetUserId(): void
    {
        self::$peter->request('GET', sprintf('%s/%s', $this->endpoint, $this->getPeterId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "User");
        self::assertSame($json['id'], $this->getPeterId());
        self::assertSame($json['name'], "Peter");
        self::assertSame($json['roles'][0], "ROLE_ADMIN");
    }

    public function testGetUserIdNoPermissions(): void
    {
        self::$brian->request('GET', sprintf('%s/%s', $this->endpoint, $this->getBrianId()), [], [], [], null);
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not get an User");
    }
}