<?php

namespace App\Http\Middleware;

use Closure;

class WzpzMiddleware
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
        if(\DB::table('wzpz')->where('auto','1')->where('status','0')->first()){
            return $next($request);
        }else{
            return redirect('/dingdan/zbd'); 
            
        }

    }
}
