<?php

namespace Stevebauman\Active\Tests;

use Mockery;
use Orchestra\Testbench\TestCase as FunctionalTestCase;
use Stevebauman\Active\ActiveServiceProvider;
use Stevebauman\Active\Facades\Active;

abstract class TestCase extends FunctionalTestCase
{
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

    /**
     * The active providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ActiveServiceProvider::class,
        ];
    }

    /**
     * The active aliases.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Active' => Active::class,
        ];
    }
}
