<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetServicesFromIdTest extends ServiceTestBase
{
    public function testGetServiceFromId(): void
    {
        self::$peter->request('GET', sprintf('%s/%s', $this->endpoint, $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "Service");
        self::assertSame($json['id'], $this->getServiceId());
        self::assertSame($json['name'], "TestService");
        self::assertSame($json['state'], "Funcional");
    }
}