<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return null; // Do not redirect for JSON requests
        }
    
        if ($request->routeIs('auth.login')) {
            return route('admin-login'); // Redirect to the admin login route
        } elseif ($request->routeIs('auth.department_login')) {
            return route('department-login'); // Redirect to the department login route
        } elseif ($request->routeIs('auth.supervisor')) {
            return route('supervisor-login'); // Redirect to the supervisor login route
        } elseif ($request->routeIs('auth.login_student')) {
            return route('student-login'); // Redirect to the student login route
        }
    
        // Default redirect (if no matching route is found)
        return route('site.index'); // Redirect to the default login route
    }
}
