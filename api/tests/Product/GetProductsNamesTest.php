<?php

namespace App\Tests\Product;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetProductsNamesTest extends ProductTestBase
{
    public function testGetProductsNames(): void
    {
        self::$peter->request('GET', sprintf('%s/names', $this->endpoint), [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertCount(1, $json);
        self::assertSame($json[0]['name'], "TestProduct");
    }
}