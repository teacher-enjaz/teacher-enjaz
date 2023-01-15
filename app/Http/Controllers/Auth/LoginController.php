<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rawafed\CheckRequest;
use App\Models\Rawafed\Employee;
use App\Models\Rawafed\Information;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SimpleSAML_Auth_Simple;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::INDEX;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $siteInfo = Information::select('logo','favicon')->first();
        return view('auth.login',compact('siteInfo'));
    }
    /**
     * show user type view
     */
    public function getUserType()
    {
        return view('auth.userType');
    }

    /*
     * @param Request $request
     */
    public function checkUser(Request $request)
    {
        if(User::where('identity_no',$request->identity_no)->first())
        {
            return redirect()->route('auth.userType')->with('error', __('messages.userIsExist'));
        }
        elseif(Employee::where('identity_no',$request->identity_no)->first())
        {
            $request->session()->put('user', Employee::where('identity_no',$request->identity_no)->first()->id);
            return redirect()->route('auth.teacherSupervisorRegisterForm');
        }
        else
            return redirect()->route('auth.userType')->with('error', __('messages.notFoundUser'));
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/portal');
    }
}
