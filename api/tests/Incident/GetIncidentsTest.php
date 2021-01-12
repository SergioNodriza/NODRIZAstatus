<?php

namespace App\Tests\Incident;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetIncidentsTest extends IncidentTestBase
{
    public function testGetIncidents(): void
    {
        self::$peter->request('GET', $this->endpoint, [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "hydra:Collection");
        self::assertCount(2, $json['hydra:member']);
    }
}