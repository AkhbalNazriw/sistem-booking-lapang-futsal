<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseConnectionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabaseConnection()
    {
        $database = app('db')->connection()->getPdo();

        $this->assertTrue(!empty($database), 'Database connection failed.');
    }
}
