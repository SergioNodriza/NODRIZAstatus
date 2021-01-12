<?php


namespace App\Tests\Incident;


class IncidentSubscriberTest extends IncidentTestBase
{
    public function testCreateAndUpdate2Services(): void
    {
        $gravity = ["Baja", "Media", "Crítica"];
        $serviceState = ["Advertencias Leves", "Advertencias Leves", "Error"];
        $payload = [
            "name" => "TestIncidentUpdate",
            "information" => "Información",
            "state" => "En investigación",
            "gravity" => $gravity[0],
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);

        $id = $json['id'];

        for ($i = 0; $i < 3; $i++) {

            $payload2 = [
                "name" => "TestIncidentUpdate",
                "information" => "Información",
                "state" => "En investigación",
                "gravity" => $gravity[$i],
                "services" => [
                    sprintf("/api/services/%s", $this->getServiceId()),
                    sprintf("/api/services/%s", $this->getServiceId2())
                ]
            ];

            self::$peter->request('PUT', sprintf("%s/%s", $this->endpoint, $id), [], [], [], json_encode($payload2));
            self::$peter->request('GET', "/api/services", [], [], [], null);
            $response = self::$peter->getResponse();
            $jsonServices = json_decode($response->getContent(), true);

            self::assertSame($jsonServices["hydra:member"][0]['state'], $serviceState[$i]);
            self::assertSame($jsonServices["hydra:member"][1]['state'], $serviceState[$i]);
        }
    }

    public function testLimitBajas(): void
    {
        for ($i = 0; $i < 4; $i++) {

            $payload = [
                "name" => "TestIncident" . $i,
                "information" => "Información",
                "state" => "En investigación",
                "gravity" => "Baja",
                "services" => [
                    sprintf("/api/services/%s", $this->getServiceId())
                ]
            ];
            self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        }

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService = json_decode($response->getContent(), true);

        self::assertSame($jsonService["state"], "Advertencias");
    }

    public function testLimitMedias(): void
    {
        for ($i = 0; $i < 2; $i++) {

            $payload = [
                "name" => "TestIncident" . $i,
                "information" => "Información",
                "state" => "En investigación",
                "gravity" => "Media",
                "services" => [
                    sprintf("/api/services/%s", $this->getServiceId())
                ]
            ];
            self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        }

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService = json_decode($response->getContent(), true);

        self::assertSame($jsonService["state"], "Advertencias");
    }

    public function testIncidentsToFuncional(): void
    {
        $state = ["En investigación", "Resuelto"];
        $serviceState = ["Error", "Funcional"];

        $payload = [
            "name" => "TestIncidentUpdate",
            "information" => "Información",
            "state" => $state[0],
            "gravity" => "Crítica",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        $response = self::$peter->getResponse();
        $json = json_decode($response->getContent(), true);
        $id = $json['id'];

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService = json_decode($response->getContent(), true);

        self::assertSame($jsonService['state'], $serviceState[0]);

        $payload2 = [
            "name" => "TestIncidentUpdate",
            "information" => "Información",
            "state" => $state[1],
            "gravity" => "Crítica",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$peter->request('PUT', sprintf("%s/%s", $this->endpoint, $id), [], [], [], json_encode($payload2));
        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService = json_decode($response->getContent(), true);

        self::assertSame($jsonService['state'], $serviceState[1]);
    }

    public function testFixSomeIncidents(): void
    {
        $state = ["En investigación", "Resuelto"];
        $serviceState = ["Advertencias", "Advertencias Leves"];

        for ($i = 0; $i < 2; $i++) {
            $payload = [
                "name" => "TestIncidentUpdate" . $i,
                "information" => "Información",
                "state" => $state[0],
                "gravity" => "Media",
                "services" => [
                    sprintf("/api/services/%s", $this->getServiceId())
                ]
            ];

            self::$peter->request('POST', sprintf("%s/create", $this->endpoint), [], [], [], json_encode($payload));
        }

        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService = json_decode($response->getContent(), true);

        self::assertSame($jsonService["state"], $serviceState[0]);

        self::$peter->request('GET', sprintf("/api/services/%s/incidents", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonIncidents = json_decode($response->getContent(), true);

        $id = $jsonIncidents["hydra:member"][0]["id"];

        $payload2 = [
            "name" => "TestIncidentUpdate" . $i,
            "information" => "Información",
            "state" => $state[1],
            "gravity" => "Media",
            "services" => [
                sprintf("/api/services/%s", $this->getServiceId())
            ]
        ];

        self::$peter->request('PUT', sprintf("%s/%s", $this->endpoint, $id), [], [], [], json_encode($payload2));
        self::$peter->request('GET', sprintf("/api/services/%s", $this->getServiceId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonService = json_decode($response->getContent(), true);

        self::assertSame($jsonService['state'], $serviceState[1]);
    }
}