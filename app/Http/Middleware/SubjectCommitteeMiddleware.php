<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectCommitteeMiddleware
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
        if (Auth::check())
        {
            //get file materials
            $user_id = Auth::user()->id;

            //get data of auth user
            $user = User::find($user_id);
            //$userPermission = $user->subject_committee;
            if($user->subject_committee == 1)
            {
                return $next($request);
            }
            else{
            abort(404);
                //return redirect()->route("nopermission");
            }
        }

    }
}
