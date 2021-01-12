<?php

namespace App\Tests\Incident;

use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateIncidentTest extends IncidentTestBase
{
    public function testUpdateIncident(): void
    {
        $name = "TestIncidentBaja";
        $info = "Información";
        $state = "En investigación";
        $gravity = "Baja";
        $service = $this->getServiceId();

        $payload = [
            "name" => $name,
            "information" => $info,
            "state" => $state,
            "gravity" => $gravity,
            "services" => [
                sprintf("/api/services/%s", $service)
            ]
        ];

        self::$peter->request('PUT', sprintf("%s/%s", $this->endpoint, $this->getIncidentBajaId()), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertSame($json['@type'], "Incident");
        self::assertSame($json['name'], $name);
        self::assertSame($json['information'], $info);
        self::assertSame($json['state'], $state);
        self::assertSame($json['gravity'], $gravity);
        self::assertIsArray($json['services']);
        self::assertCount(1, $json['services']);
        self::assertSame($json['services'][0], sprintf("/api/services/%s", $service));
    }

    public function testUpdateIncidentNotLogged(): void
    {
        $payload = [
            "name" => "TestIncidentBaja",
            "information" => "Información",
            "state" => "En investigación",
            "gravity" => "Baja",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$roger->request('PUT', sprintf("%s/%s", $this->endpoint, $this->getIncidentBajaId()), [], [], [], json_encode($payload));
        $response = self::$roger->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_UNAUTHORIZED, $response->getStatusCode());
        self::assertSame($json['code'], 401);
        self::assertSame($json['message'], "JWT Token not found");
    }
}