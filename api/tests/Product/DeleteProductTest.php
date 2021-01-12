<?php

namespace App\Tests\Product;

use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteProductTest extends ProductTestBase
{
    public function testDeleteProduct(): void
    {
        self::$peter->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getProductId()), [], [], [], null);
        $response = self::$peter->getResponse();

        self::assertSame(JsonResponse::HTTP_NO_CONTENT, $response->getStatusCode());
    }

    public function testDeleteProductNoPermissions(): void
    {
        self::$brian->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getProductId()), [], [], [], null);
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not delete a Product");
    }
}