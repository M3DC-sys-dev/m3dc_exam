<?php

namespace App\Http\Middleware;

use Closure;
use App\SeminarInput;

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
        // 英語の場合、fnameは「名」で、lnameは「姓」はずだと思いますが、
        // こちらで日本名前の習慣に従います（「姓　名」になります）
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
