<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if (in_array('auth:admin', $request->route()->middleware())) {

                return route('dashboard.admin.login');
            }

            if (in_array('auth:owner', $request->route()->middleware())) {

                return route('dashboard.owner.login');
            }

            return route('login');
        }
    }
}
