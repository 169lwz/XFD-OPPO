<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
         if($request->session()->has("user")){
            return $next($request);
        }else{
            return redirect("/home/login/login"); //返回登录页面
        }
    }
}