<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class check
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
        if($request->session()->get('email')){
            return $next($request);
        }
        else{
            Session::flash('msg','You need to login first');
            return response()->view('welcome',['msg'=>'You need to login first']);
        }
    }
}
