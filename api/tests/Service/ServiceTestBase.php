<?php

namespace App\Tests\Service;

use App\Tests\TestBase;

class ServiceTestBase extends TestBase
{
    protected string $endpoint;

    protected function setUp(): void
    {
        parent::setUp();

        $this->endpoint = '/api/services';
    }
}