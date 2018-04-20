<?php

namespace App\Http\Middleware;

use Closure;

class Employee
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
        $company = $request->route()->parameters()['company'];
        if (auth()->user() and (auth()->user()->company_id == $company)) {
            return $next($request);
        }
        return redirect()->home();
    }
}
