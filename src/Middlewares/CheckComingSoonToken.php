<?php

namespace VamikaDigital\ComingSoon\Middlewares;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckComingSoonToken
{
  private $excludeRoutes = [
    'comingsoon.index',
    'comingsoon.token',
  ];

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $currentRoute = Route::currentRouteName();
    if ((!is_null($currentRoute) && in_array($currentRoute, $this->excludeRoutes)) || $request->session()->has('comingsoon-token')) {
      return $next($request);
    } else {
      return redirect('/coming-soon');
    }
  }
}
