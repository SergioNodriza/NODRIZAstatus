<?php

namespace App\Tests\Incident;

use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteIncidentTest extends IncidentTestBase
{
    public function testDeleteIncident(): void
    {
        self::$peter->request('DELETE', sprintf("%s/%s", $this->endpoint, $this->getIncidentBajaId()), [], [], [], null);
        $response = self::$peter->getResponse();

        self::assertSame(JsonResponse::HTTP_NO_CONTENT, $response->getStatusCode());
    }

    public function testDeleteIncidentNoPermissions(): void
    {
        self::$brian->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getIncidentBajaId()), [], [], [], null);
        $response = self::$brian->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        self::assertSame($json['hydra:title'], "An error occurred");
        self::assertSame($json['hydra:description'], "Wrong Permissions, You can not delete an Incident");
    }

    public function testDeleteIncidentNotLogged(): void
    {
        self::$roger->request('DELETE', sprintf('%s/%s', $this->endpoint, $this->getIncidentBajaId()), [], [], [], null);
        $response = self::$roger->getResponse();
        $json = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_UNAUTHORIZED, $response->getStatusCode());
        self::assertSame($json['code'], 401);
        self::assertSame($json['message'], "JWT Token not found");
    }
}