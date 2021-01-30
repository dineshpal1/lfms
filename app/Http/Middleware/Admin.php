<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
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
         if(Auth::check() && Auth::user()->role->id==1)
        {
            
           return $next($request); 
            //return redirect()->route("dashboard");
            
        }else if(Auth::check() && Auth::user()->role->id==2)
        {
          return redirect()->route("advocatedashboard");
        }else if(Auth::check() && Auth::user()->role->id==3){
           return redirect()->route("accountantdashboard");
         }else if(Auth::check() && Auth::user()->role->id==4){

           return redirect()->route("othersdashboard");
         }
         else{
             return redirect()->route("clientdashboard");
         }
    }
}
