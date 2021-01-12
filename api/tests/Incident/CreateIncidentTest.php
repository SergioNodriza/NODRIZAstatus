<?php

namespace App\Tests\Incident;

use Symfony\Component\HttpFoundation\JsonResponse;

class CreateIncidentTest extends IncidentTestBase
{
    public function testCreateIncident(): void
    {
        $name = "IncidentTest";
        $info = "Info";
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

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_CREATED, $response->getStatusCode());
        self::assertSame($json['@type'], "Incident");
        self::assertSame($json['name'], $name);
        self::assertSame($json['information'], $info);
        self::assertSame($json['state'], $state);
        self::assertSame($json['gravity'], $gravity);
        self::assertIsArray($json['services']);
        self::assertCount(1, $json['services']);
        self::assertSame($json['services'][0], sprintf("/api/services/%s", $service));

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $json2 = json_decode($response->getContent(), true);

        self::assertSame($json2['state'], "Advertencias Leves");
    }

    public function testCreateIncidentAlreadyExist(): void
    {
        $name = "TestIncidentBaja";
        $payload = [
            "name" => "TestIncidentBaja",
            "information" => "Información",
            "state" => "investigación",
            "gravity" => "Baja",
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_CONFLICT, $response->getStatusCode());
        self::assertSame($json['class'], "App\Exceptions\AlreadyExistsException");
        self::assertSame($json['code'], 409);
        self::assertSame($json['message'], sprintf("Incident %s already exist", $name));
    }

    public function testCreateIncidentNotLogged(): void
    {
        $payload = [
            "name" => "IncidentTest",
            "information" => "Info",
            "state" => "En investigación",
            "gravity" => "Baja",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$roger->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$roger->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_UNAUTHORIZED, $response->getStatusCode());
        self::assertSame($json['code'], 401);
        self::assertSame($json['message'], "JWT Token not found");
    }
}