<?php

namespace App\Http\Middleware;

use Closure;

class BoxMiddleware
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
        if ($request->user()->permission != 'box')
		{
			return redirect('errors/boxowner');
		}

        return $next($request);
    }
}
