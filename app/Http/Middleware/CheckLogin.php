<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Rawafed\Role;
use App\Models\Rawafed\Employee;
use App\Models\Rawafed\UserType;
use Illuminate\Support\Facades\Auth;
use Closure;
use SimpleSAML\Auth\Simple;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        {
            $as = new Simple('default-sp');
            if (!$as->isAuthenticated()) {
                if ($request->ajax()) {
                    return response()->json([], 401);
                } else {
                    $as->requireAuth();
                }
            } else {
                $attributes = $as->getAttributes();
                //dd($attributes);
                session(
                    [
                        'idNo' => $attributes['UserIdentity'][0],
                        'name' => $attributes['Name'][0],
                        //'type' => $attributes['AccountType'][0],
                    ]
                );
                $identity_no = (int) $attributes['UserIdentity'][0];

                $user = User::where('identity_no',$identity_no)->first();

                $userRole = Role::where('slug','user')->first();
                $teacherRole = Role::where('slug','teacher')->first();
                $supervisorRole = Role::where('slug','supervisor')->first();

                if(isset($user))
                {
                    if($user->complete == 1)
                    {
                        auth()->login($user,true);
                        return redirect()->to('/portal');
                    }
                    elseif($user->complete == 0 && Employee::where('identity_no',$identity_no)->first())
                    {
                        auth()->login($user,true);
                        return redirect()->route('dashboard.profile.editSupervisor');
                    }
                    else
                        return redirect()->route('dashboard.profile.userType');
                }
                elseif(Employee::where('identity_no',$identity_no)->first())
                {
                    //if user not exists in the system and its teacher or supervisor
                    $employee = Employee::where('identity_no',$identity_no)->first();
                    $request->session()->put('user', $employee->id);
                    if($employee->job == 'مشرف تربوي')
                        $user_type_id = UserType::select('id')->where('name_en', 'Supervisor')->first()->id;
                    elseif($employee->job == 'معلم')
                        $user_type_id = UserType::select('id')->where('name_en', 'Teacher')->first()->id;

                    if($employee->gender == 'ذكر')
                        $image = 'male.png';
                    else
                        $image = 'female.png';

                    $newUser = User::create([
                        'name_ar' => $attributes['Name'][0],
                        'name_en' => $attributes['Name'][0],
                        'image' => $image,
                        'image_flag' => 0,
                        'complete' => 0,
                        'identity_no' => $identity_no,
                        'user_type_id' => $user_type_id,
                    ]);
                    auth()->login($newUser,true);
                    $user = Auth::user();

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
                {
                    $user_type_id = UserType::select('id')->where('name_en', 'User')->first()->id;
                    //if he student or parent
                    $newUser = User::create([
                        'name_ar' => $attributes['Name'][0],
                        'name_en' => $attributes['Name'][0],
                        'image' => 'person.png',
                        'image_flag' => 0,
                        'complete' => 0,
                        'identity_no' => $identity_no,
                        'user_type_id' => $user_type_id,
                    ]);
                    auth()->login($newUser,true);
                    $user = Auth::user();
                    $user->role()->sync($userRole->id);
                    $user->permission()->sync($userRole->permission->pluck('id')->toArray());
                    return redirect()->route('dashboard.profile.userType');
                }
            }
        }
        return $next($request);
    }
}
