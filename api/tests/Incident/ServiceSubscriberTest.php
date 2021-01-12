<?php


namespace App\Tests\Incident;


class ServiceSubscriberTest extends IncidentTestBase
{
    public function testProductState(): void
    {
        $state = ["En investigación", "Resuelto"];
        $gravity = ["Baja", "Crítica"];
        $serviceState = ["Advertencias Leves", "Error"];

        $payload = [
            "name" => "TestIncidentB",
            "information" => "Información",
            "state" => $state[0],
            "gravity" => $gravity[0],
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        $payload2 = [
            "name" => "TestIncidentC",
            "information" => "Información",
            "state" => $state[0],
            "gravity" => $gravity[1],
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId2())
            ]
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload2));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);
        $id = $json["id"];

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService1 = json_decode($response->getContent(), true);
        self::assertSame($jsonService1['state'], $serviceState[0]);

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId2()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService2 = json_decode($response->getContent(), true);
        self::assertSame($jsonService2['state'], $serviceState[1]);

        self::$peter->request('GET', sprintf("/api/products/%s", $this->getProductId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonProduct = json_decode($response->getContent(), true);
        self::assertSame($jsonProduct["state"], $serviceState[1]);

        /*
         * Fix 1 incident to change product state
         */

        $payload3 = [
            "name" => "TestIncidentC",
            "information" => "Información",
            "state" => $state[1],
            "gravity" => $gravity[1],
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId2())
            ]
        ];

        self::$peter->request('PUT', sprintf("%s/%s", $this->endpoint, $id), [], [], [], json_encode($payload3));
        self::$peter->request('GET', sprintf("/api/products/%s", $this->getProductId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonProduct = json_decode($response->getContent(), true);

        self::assertSame($jsonProduct["state"], $serviceState[0]);
    }
}