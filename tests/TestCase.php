<?php

namespace Stevebauman\Active\Tests;

use Mockery;
use Orchestra\Testing\ApplicationTestCase;

abstract class TestCase extends ApplicationTestCase
{
    /**
     * Base application namespace.
     *
     * @var string
     */
    protected $baseNamespace = 'Stevebauman\\Active';

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Returns a new class mock.
     *
     * @param string $class
     *
     * @return Mockery\MockInterface
     */
    public function mock($class)
    {
        return Mockery::mock($class);
    }

    /**
     * Get base path.
     *
     * @return string
     */
    protected function getBasePath()
    {
        return realpath(__DIR__.'/../');
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }
}
