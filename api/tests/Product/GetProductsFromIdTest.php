<?php

namespace App\Tests\Product;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetProductsFromIdTest extends ProductTestBase
{
    public function testGetProductsFromId(): void
    {
        self::$peter->request('GET', sprintf('%s/%s', $this->endpoint, $this->getProductId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "Product");
        self::assertSame($json['id'], $this->getProductId());
        self::assertSame($json['name'], "TestProduct");
        self::assertSame($json['state'], "Funcional");
    }
}