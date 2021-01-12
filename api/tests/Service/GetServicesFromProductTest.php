<?php

namespace App\Tests\Service;

class GetServicesFromProductTest extends ServiceTestBase
{
    public function testGetServicesFromProduct(): void
    {
        self::$peter->request('GET', sprintf("/api/products/%s/services", $this->getProductId()), [], [], [], null);
        $response = self::$peter->getResponse();
        $jsonServices = json_decode($response->getContent(), true);

        self::assertCount(2, $jsonServices["hydra:member"]);
        self::assertSame($jsonServices["hydra:member"][0]["@type"], "Service");
        self::assertSame($jsonServices["hydra:member"][1]["@type"], "Service");
    }
}