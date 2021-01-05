<?php

namespace Stevebauman\Active;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class Active
{
    /**
     * The wildcard string.
     *
     * @var string
     */
    protected $wildcard = '*';

    /**
     * The output class string.
     *
     * @var string
     */
    protected $output = 'active';

    /**
     * The current route.
     *
     * @var Route
     */
    protected $route;

    /**
     * The current request.
     *
     * @var Request
     */
    protected $request;

    /**
     * The default resource route path names.
     *
     * @var array
     */
    protected $defaultResourcePaths = [
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy',
    ];

    /**
     * Constructor.
     *
     * @param Request $request
     * @param Route   $route
     */
    public function __construct(Request $request, Route $route)
    {
        $this->request = $request;
        $this->route = $route;
    }

    /**
     * Return the output if the route is active.
     *
     * @param string $route
     *
     * @return null|string
     */
    public function route($route)
    {
        $current = $this->route->getName();

        if ($this->containsWildcard($route)) {
            $route = $this->stripWildcard($route);

            if (Str::contains($current, $route)) {
                return $this->output;
            }
        }

        if ($current == $route) {
            return $this->output;
        }

        return;
    }

    /**
     * Return the output if the resource is active.
     *
     * @param string $name
     * @param array  $paths
     *
     * @return null|string
     */
    public function resource($name = '', array $paths = [])
    {
        if (! Str::endsWith($name, '.')) {
            $name = $name.'.';
        }

        if (empty($paths)) {
            $paths = $this->defaultResourcePaths;
        }

        $routes = array_map(function ($key) use ($name) {
            return $name.$key;
        }, $paths);

        return $this->routes($routes);
    }

    /**
     * Return the output if the requests input is set or contains a value.
     *
     * @param string      $key
     * @param string|null $value
     *
     * @return string
     */
    public function input($key = '', $value = null)
    {
        if (! $this->request->has($key)) {
            return;
        }

        if (is_null($value)) {
            return $this->output;
        } elseif ($this->request->input($key) == $value) {
            return $this->output;
        }
    }

    /**
     * Return the output if one of the given routes are active.
     *
     * @param array $routes
     *
     * @return null|string
     */
    public function routes(array $routes = [])
    {
        foreach ($routes as $route) {
            if ($output = $this->route($route)) {
                return $output;
            }
        }

        return;
    }

    /**
     * Set the output string.
     *
     * @param string $output
     *
     * @return Active
     */
    public function output($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Determine if the string contains a wildcard.
     *
     * @param string $string
     *
     * @return bool
     */
    protected function containsWildcard($string)
    {
        return Str::contains($string, $this->wildcard);
    }

    /**
     * Remove the wildcard from the specified string.
     *
     * @param string $string
     *
     * @return string
     */
    protected function stripWildcard($string)
    {
        return str_replace($this->wildcard, null, $string);
    }

    /**
     * Get the current route.
     *
     * @return Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set the current route name.
     *
     * @param Route $route
     *
     * @return Active
     */
    public function setRoute(Route $route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get the current request.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the current request.
     *
     * @param Request $request
     *
     * @return Active
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
