<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::guard('user')->user()->role != 'Student'){

        //     return redirect()->route('admin.login-user');
        // }
        return $next($request);
    }
}
