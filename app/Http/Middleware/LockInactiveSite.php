<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use GeneralSettings;
use Illuminate\Http\Request;

class LockInactiveSite
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
        if (!app(GeneralSettings::class)->site_active && !Auth::check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
