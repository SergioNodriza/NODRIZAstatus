<?php

namespace App\Tests\Incident;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetIncidentsFromIdTest extends IncidentTestBase
{
    public function testGetIncidentsFromId(): void
    {
        self::$peter->request('GET', sprintf('%s/%s', $this->endpoint, $this->getIncidentBajaId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "Incident");
        self::assertSame($json['id'], $this->getIncidentBajaId());
        self::assertSame($json['name'], "TestIncidentBaja");
        self::assertSame($json['information'], "Información");
        self::assertSame($json['state'], "En Investigación");
        self::assertSame($json['gravity'], "Baja");
    }
}