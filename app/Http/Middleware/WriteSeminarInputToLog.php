<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class WriteSeminarInputToLog
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
        $todohuken = $request->todohuken;
        $sei = $request->sei;
        $mei = $request->mei;
        $ninzu = $request->ninzu;
        $ip = $request->ip();
        $referer = $request->server('HTTP_REFERER');
        $usr_agent = $request->server('HTTP_USER_AGENT');

        Log::channel('seminar')
            ->info("$todohuken,$sei,$mei,$ninzu,$ip,$referer,$usr_agent");

        return $next($request);
    }
}
