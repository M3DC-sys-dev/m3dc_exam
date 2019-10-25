<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

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

        $fileDateTime = date('Y_m_d_H:i:s');
        $currentDateTime = date('Y-m-d H:i:s');

        // /storage/app/logsにログを書きます
        // 'seminal_logs'の場所はconfig/filesystems.phpで設定されています
        Storage::disk('seminar_logs')
            ->put("$fileDateTime.log", "$currentDateTime,$todohuken,$sei,$mei,$ninzu,$ip,$referer,$usr_agent\n");

        return $next($request);
    }
}
