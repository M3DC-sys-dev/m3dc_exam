<?php

namespace App\Http\Middleware;

use Closure;

class WriteSeminarInputToDB
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
        $input = new SeminarInput;
        
        $input->crnt_date = date('Y-m-d H:i:s');
        $input->todohuken = $request->todohuken;
        $input->fname = $request->sei;
        $input->lname = $request->mei;
        $input->viewcnt = $request->ninzu;
        $input->ip_addr = $request->ip();
        $input->referer = $request->server('HTTP_REFERER');
        $input->usr_agent = $request->server('HTTP_USER_AGENT');

        $input->save();

        return $next($request);
    }
}
