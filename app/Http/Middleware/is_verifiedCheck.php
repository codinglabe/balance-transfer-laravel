<?php

namespace App\Http\Middleware;

use App\Models\VerifiedUser;
use Closure;
use Illuminate\Http\Request;

class is_verifiedCheck
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
        if(!session()->has('codeVerify')){
            return redirect()->back();
        }

        return $next($request);
    }
}
