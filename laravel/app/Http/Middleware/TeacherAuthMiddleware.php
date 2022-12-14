<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class TeacherAuthMiddleware
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
        if(Auth::check()){
            return $next($request);
        }else{
            Session::put('teacher_class_url', $request->url());
            return redirect(url('teacher'));
        }
    
    }
}
