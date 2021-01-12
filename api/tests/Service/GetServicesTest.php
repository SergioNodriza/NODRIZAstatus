<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetServicesTest extends ServiceTestBase
{
    public function testGetServices(): void
    {
        self::$peter->request('GET', $this->endpoint, [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "hydra:Collection");
        self::assertCount(2, $json['hydra:member']);
    }
}