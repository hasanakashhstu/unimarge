<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\URL;

class StudentAuthMiddleware
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
        $user_auth_check=Session::get('student_or_parents_login');
        if($user_auth_check=='Loggedin'){
            return $next($request);
       }else{
           Session::put('class_url', $request->url());
           return redirect(url('student'));
       }
      
    }
}
