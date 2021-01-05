<?php

namespace Stevebauman\Active\Tests;

use Stevebauman\Active\ActiveServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * The active providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ActiveServiceProvider::class];
    }
}
