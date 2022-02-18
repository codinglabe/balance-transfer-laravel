<?php

namespace App\Http\Middleware;

use App\Models\VerifiedUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logInCheck
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
        if(Auth::guard('verified_user')->user()){
            return $next($request);
            if(!session()->has('codeVerify')){
                return redirect()->back();
            }
        }
        return redirect()->route('Login-UI')->with('Failed','You need login first !');
        
        
    }
}
