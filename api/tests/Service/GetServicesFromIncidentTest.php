<?php

namespace App\Tests\Service;

class GetServicesFromIncidentTest extends ServiceTestBase
{
    public function testGetServicesFromIncident(): void
    {
       $payload = [
            "name" => "IncidentTest",
            "information" => "",
            "state" => "En investigación",
            "gravity" => "Baja",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$peter->request('POST', "/api/incidents/create", [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::$peter->request('GET', sprintf("/api/incidents/%s/services", $json["id"]), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonServices = json_decode($response->getContent(), true);

        self::assertSame($jsonServices["hydra:member"][0]["@type"], "Service");
    }
}