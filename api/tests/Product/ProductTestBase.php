<?php

namespace App\Tests\Product;

use App\Tests\TestBase;

class ProductTestBase extends TestBase
{
    protected string $endpoint;

    protected function setUp(): void
    {
        parent::setUp();

        $this->endpoint = '/api/products';
    }
}