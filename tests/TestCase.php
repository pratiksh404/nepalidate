<?php

namespace Pratiksh\Nepalidate\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Pratiksh\Nepalidate\Providers\NepalidateServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /**
     * Set up the test case.
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Add your setup code here
    }

    /**
     * Clean up after the test case.
     */
    protected function tearDown(): void
    {
        // Add your teardown code here
        parent::tearDown();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            NepalidateServiceProvider::class,
        ];
    }
}
