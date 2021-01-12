<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteServiceTest extends ServiceTestBase
{
    public function testDeleteService(): void
    {
        self::$peter->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();

        self::assertSame(JsonResponse::HTTP_NO_CONTENT, $response->getStatusCode());
    }

    public function testDeleteServiceNoPermissions(): void
    {
        self::$brian->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getServiceId()), [], [], [], null);
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not delete a Service");
    }
}
