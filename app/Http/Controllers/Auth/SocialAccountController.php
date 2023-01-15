<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rawafed\Employee;
use App\Models\User;
use App\Rawafed\Interfaces\PermissionInterface;
use App\Rawafed\Interfaces\RoleInterface;
use App\Rawafed\Interfaces\UserInterface;
use App\Services\SocialAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    private $userRepository,$roleRepository,$permissionRepository;
    public function __construct(UserInterface $userRepository, RoleInterface $roleRepository, PermissionInterface $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param SocialAccountService $profileService
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(SocialAccountService $profileService,$provider)
    {
        try{
            $user = Socialite::driver($provider)->user();

        }catch (\Exception $ex)
        {
            return redirect()->to('login');
        }
        // $user->token;
        //check the account of user if exist in database
        $authUser = $profileService->findOrCreate($user,$provider);
        $user = User::find($authUser->id);
        auth()->login($authUser, true);

        if($user->complete != 1)
        {
            $userRole = $this->roleRepository->getRoleIDBySlug('user');
            $user->role()->sync($userRole);
            $user->permission()->sync($userRole->permission->pluck('id')->toArray());
            return redirect()->route('dashboard.profile.userType');
        }
        else
            return redirect()->to('cPanel');//complete profile user data form
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getUserType()
    {
        return view('dashboard.profile.userType');
    }
    public function checkUser(Request $request)
    {
        $userRole = $this->roleRepository->getRoleIDBySlug('user');
        $teacherRole = $this->roleRepository->getRoleIDBySlug('teacher');
        $supervisorRole = $this->roleRepository->getRoleIDBySlug('supervisor');

        $employee = Employee::where('identity_no',$request->identity_no)->first();
        if(Employee::where('identity_no',$request->identity_no)->first())
        {
            $request->session()->put('user', Employee::where('identity_no',$request->identity_no)->first()->id);
            $user = $this->userRepository->getUserId(Auth::id());
            if($employee->job == 'معلم')
            {
                $user->role()->sync($teacherRole->id);
                $user->permission()->sync($teacherRole->permission->pluck('id')->toArray());
            }
            elseif($employee->job == 'مشرف تربوي')
            {

                $user->role()->sync($supervisorRole->id);
                $user->permission()->sync($supervisorRole->permission->pluck('id')->toArray());
            }
            else
            {
                $user->role()->sync($userRole->id);
                $user->permission()->sync($userRole->permission->pluck('id')->toArray());
            }
            return redirect()->route('dashboard.profile.createSupervisor');
        }
        else
            return redirect()->route('dashboard.profile.userType')->with('error', __('messages.notFoundUser'));
    }
}
