<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateServiceTest extends ServiceTestBase
{
    public function testUpdateService(): void
    {
        $name = "ServiceTest2";
        $product = $this->getProductId();
        $payload = [
            "name" => "ServiceTest2",
            "product" => sprintf("/api/products/%s", $product)
        ];

        self::$peter->request('PUT', sprintf("%s/%s", $this->endpoint, $this->getServiceId()), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "Service");
        self::assertSame($json['name'], $name);
        self::assertSame($json['state'], "Funcional");
    }

    public function testUpdateServiceNoPermissions(): void
    {
        $payload = [
            "name" => "ServiceTest2",
            "product" => sprintf("/api/products/%s", $this->getProductId())
        ];

        self::$brian->request('PUT', sprintf("%s/%s", $this->endpoint, $this->getServiceId()), [], [], [], json_encode($payload));
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not update a Service");
    }
}