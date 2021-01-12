<?php

namespace App\Tests\Product;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetProductsTest extends ProductTestBase
{
    public function testGetProducts(): void
    {
        self::$peter->request('GET', $this->endpoint, [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "hydra:Collection");
        self::assertCount(1, $json['hydra:member']);
    }
}