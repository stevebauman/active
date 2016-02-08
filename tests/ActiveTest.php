<?php

namespace Stevebauman\Active\Tests;

use Stevebauman\Active\Active;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ActiveTest extends TestCase
{
    protected function newActive()
    {
        $request = $this->mock(Request::class);
        $route = $this->mock(Route::class);

        return new Active($request, $route);
    }

    public function test_with_current_route()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->once()->andReturn('issues.index');

        $output = $active->route('issues.index');

        $this->assertEquals('active', $output);
    }

    public function test_with_wildcard_current_route()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->once()->andReturn('issues.index');

        $output = $active->route('issues.*');

        $this->assertEquals('active', $output);
    }

    public function test_with_multiple_routes()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->twice()->andReturn('issues.index');

        $routes = [
            'some.route',
            'issues.index',
            'some.other.route',
        ];

        $output = $active->routes($routes);

        $this->assertEquals('active', $output);
    }

    public function test_with_multiple_routes_wildcard()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->twice()->andReturn('issues.index');

        $routes = [
            'some.route',
            'issues.*',
            'some.other.route',
        ];

        $output = $active->routes($routes);

        $this->assertEquals('active', $output);
    }

    public function test_with_non_current_route()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->once()->andReturn('none');

        $output = $active->route('issues.index');

        $this->assertNull($output);
    }

    public function test_with_non_current_routes_wildcard()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->twice()->andReturn('none');

        $routes = [
            'some.route.*',
            'some.*',
        ];

        $output = $active->routes($routes);

        $this->assertNull($output);
    }

    public function test_with_custom_output()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->once()->andReturn('issues.index');

        $output = $active->output('custom')->route('issues.index');

        $this->assertEquals('custom', $output);
    }

    public function test_with_only_wildcard()
    {
        $active = $this->newActive();

        $active->getRoute()->shouldReceive('getName')->once()->andReturn('issues.index');

        $output = $active->route('*');

        $this->assertNull($output);
    }
}
