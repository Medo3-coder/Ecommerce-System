<?php

namespace App\Http\Middleware\Api;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class ApiLang {
    public function handle($request, Closure $next) {
        $lang = defaultLang();
        if ($request->header('Lang') != null && in_array($request->header('Lang'), languages())) {
            $lang = $request->header('Lang');
        } elseif (auth()->check()) {
            $lang = auth()->user()->lang;
        }
        App::setlocale($lang);
        Carbon::setlocale($lang);
        return $next($request);

    }
}
