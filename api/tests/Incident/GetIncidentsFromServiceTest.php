<?php

namespace App\Tests\Incident;

class GetIncidentsFromServiceTest extends IncidentTestBase
{
    public function testGetIncidentsFromService(): void
    {
        $payload = [
            "name" => "TestIncidentService",
            "information" => "Info",
            "state" => "En investigación",
            "gravity" => "Media",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];
        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));

        self::$peter->request('GET', sprintf("/api/services/%s/incidents", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonIncidents = json_decode($response->getContent(), true);

        self::assertSame($jsonIncidents["@type"], "hydra:Collection");
        self::assertCount(1, $jsonIncidents["hydra:member"]);
    }
}