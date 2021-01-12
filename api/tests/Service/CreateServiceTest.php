<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class CreateServiceTest extends ServiceTestBase
{
    public function testCreateService(): void
    {
        $name = "ServiceTest";
        $payload = [
            "name" => $name,
            "product" => sprintf("/api/products/%s", $this->getProductId())
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_CREATED, $response->getStatusCode());
        self::assertSame($json['@type'], "Service");
        self::assertSame($json['name'], $name);
        self::assertSame($json['state'], "Funcional");
    }

    public function testCreateServiceNoPermissions(): void
    {
        $payload = [
            "name" => "ServiceTest",
            "product" => sprintf("/api/products/%s", $this->getProductId())
        ];

        self::$brian->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], 'Wrong Permissions, You can not create a Service');
    }

    public function testCreateServiceAlreadyExists(): void
    {
        $name = "TestService";
        $payload = [
            "name" => $name,
            "product" => sprintf("/api/products/%s", $this->getProductId())
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame($json['class'], "App\Exceptions\AlreadyExistsException");
        self::assertSame($json['code'], JsonResponse::HTTP_CONFLICT);
        self::assertSame($json['message'], sprintf("Service %s already exist", $name));
    }
}