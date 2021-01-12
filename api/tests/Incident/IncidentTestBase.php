<?php

namespace App\Tests\Incident;

use App\Tests\TestBase;

class IncidentTestBase extends TestBase
{
    protected string $endpoint;

    protected function setUp(): void
    {
        parent::setUp();

        $this->endpoint = '/api/incidents';
    }
}