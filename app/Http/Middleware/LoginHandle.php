<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginHandle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->complete != 1)
        {
            $url=$request->url();
            $url2=route('dashboard.profile.userType');
            $urls =[];
            $urls[]=route('dashboard.profile.createUser');
            $urls[]=route('dashboard.profile.createStudent');
            $urls[]=route('dashboard.profile.createSupervisor');
            $urls[]=route('dashboard.profile.updateUser',Auth::id());
            $urls[]=route('dashboard.profile.updateSupervisor',Auth::id());
            $urls[]=route('dashboard.profile.storeSupervisor',Auth::id());
            $urls[]=route('dashboard.profile.storeStudent',Auth::id());
            $urls[]=route('dashboard.profile.storeUser',Auth::id());
            $urls[]=route('dashboard.profile.updateStudent',Auth::id());
            if(in_array($url,$urls) )
                return $next($request);

            return redirect()->route('dashboard.profile.userType');
        }
        return $next($request);
    }
}
