<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\URL;

class AuthMember
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
        
        if(! isset($data->id)){
            $cookieJar = new CookieJar;
            $url_full = URL::current();
            $url_base = URL::to('/')."/";
            $url_current = str_replace($url_base, "", $url_full);
            $cookieJar->queue(cookie('page', $url_current, 60));
            return redirect('/login');
        }

        return $next($request);
    }
}
