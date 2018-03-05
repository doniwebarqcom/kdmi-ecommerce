<?php

namespace App\Http\Middleware;

use Closure;

class HaveShop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $response = get_api_response('user/info');
        $data = $response->data;
        if(! isset($data->shop))
            return redirect('/home');

        return $next($request);
    }
}
