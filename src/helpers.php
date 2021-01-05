<?php

use Stevebauman\Active\Active;

if (! function_exists('active')) {
    /**
     * Generates a new Active instance.
     *
     * @return Active
     */
    function active()
    {
        $request = request();
        $route = $request->route();

        return (new Active($request, $route))->output(
            config('active.output', 'active')
        );
    }
}
