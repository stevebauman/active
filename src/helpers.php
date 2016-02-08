<?php

use Stevebauman\Active\Active;

/**
 * Generates a new Active instance.
 *
 * @return Active
 */
function active()
{
    $request = request();
    $route = $request->route();

    return new Active($request, $route);
}
