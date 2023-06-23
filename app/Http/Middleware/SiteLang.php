<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SiteLang {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $lang = "ar";

        if (Session::has('lang') && in_array(Session::has('lang'), languages())) {
            $lang = Session::get('lang');
        }

        App::setLocale($lang);
        Carbon::setLocale($lang);

        return $next($request);
    }
}
