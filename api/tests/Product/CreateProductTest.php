<?php

namespace App\Tests\Product;

use Symfony\Component\HttpFoundation\JsonResponse;

class CreateProductTest extends ProductTestBase
{
    public function testCreateProduct(): void
    {
        $name = "ProductTest";
        $payload = [
            "name" => $name,
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_CREATED, $response->getStatusCode());
        self::assertSame($json['@type'], "Product");
        self::assertSame($json['name'], $name);
        self::assertSame($json['state'], "Funcional");
    }

    public function testCreateProductNoPermissions(): void
    {
       $payload = [
            "name" => "ProductTest",
        ];

        self::$brian->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], 'Wrong Permissions, You can not create a Product');
    }

    public function testCreateProductAlreadyExists(): void
    {
        $name = "ProductTest";
        $payload = [
            "name" => $name,
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame($json['class'], "App\Exceptions\AlreadyExistsException");
        self::assertSame($json['code'], JsonResponse::HTTP_CONFLICT);
        self::assertSame($json['message'], sprintf("Product %s already exist", $name));
    }
}