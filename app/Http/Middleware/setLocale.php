<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Config;
class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $raw_locale = $request->session()->get('locale');
      
        if (in_array($raw_locale, Config::get('app.available_locales'))) {
          $locale = $raw_locale;
        }
        else $locale = Config::get('app.locale');
          App::setLocale($locale);
          return $next($request);   
    }
}
