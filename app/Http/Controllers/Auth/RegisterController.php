<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rawafed\StudentRegisterRequest;
use App\Http\Requests\Rawafed\StudentRequest;
use App\Http\Requests\Rawafed\SupervisorTeacherRequest;
use App\Models\Rawafed\Admin;
use App\Models\Rawafed\Employee;
use App\Models\Rawafed\GeoPlace;
use App\Models\Rawafed\Grade;
use App\Models\Rawafed\Level;
use App\Models\Rawafed\Role;
use App\Models\Rawafed\Student;
use App\Models\Rawafed\Subject;
use App\Models\Rawafed\Supervisor;
use App\Models\Rawafed\Teacher;
use App\Models\Rawafed\UserType;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::INDEX;

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $geoPlaces = GeoPlace::all();
        return view('auth.register',compact('geoPlaces'));
    }

    /*
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     *  Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name_ar' => ['required', 'string', 'max:255','arabic'],
            'second_name_ar' => ['required', 'string', 'max:255','arabic'],
            'third_name_ar' => ['required', 'string', 'max:255','arabic'],
            'last_name_ar' => ['required', 'string', 'max:255','arabic'],
            'first_name_en' => ['required', 'string', 'max:255','regex:/^[\s\w. -]*$/'],
            'second_name_en' => ['required', 'string', 'max:255','regex:/^[\s\w. -]*$/'],
            'third_name_en' => ['required', 'string', 'max:255','regex:/^[\s\w. -]*$/'],
            'last_name_en' => ['required', 'string', 'max:255','regex:/^[\s\w. -]*$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'gender' => ['required', 'in:1,2'],
            'birth_date' => ['required', 'date'],
            'geoPlace_id' => ['required'],
            'directorate_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'identity_no' => ['required', 'string', 'max:9','min:9','unique:users,identity_no'],
            'mobile' => ['required', 'string', 'max:14','min:10','regex:/^[-0-9\+\s]+$/'],
        ],[
            'required' => __('validation.required'),
            'string' =>  __('validation.string'),
            'max' => __('validation.max.string'),
            'numeric' => __('validation.numeric'),
            'date' => __('validation.date'),
            'mimes' => __('validation.mimes'),
            'image' => __('validation.image'),
            'unique' => __('validation.unique'),
            'regex' => __('validation.r-regex'),
            'mobile.regex' => __('validation.m-regex'),
            'arabic' => __('validation.arabic'),
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $userRole = Role::select('*')->where('slug','user')->first();
        $user_type_id = UserType::select('id')->where('name_en', 'user')->first()->id;

        if ($data['gender'] == 1)
            $image = 'male.png';
        else
            $image = 'female.png';

        try {
            DB::beginTransaction();
            $user = User::create([
                'name_ar' => $data['first_name_ar'] . ' ' . $data['last_name_ar'],
                'name_en' => $data['first_name_en'] . ' ' . $data['last_name_en'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name_ar' => $data['first_name_ar'],
                'first_name_en' => $data['first_name_en'],
                'second_name_ar' => $data['second_name_ar'],
                'second_name_en' => $data['second_name_en'],
                'third_name_ar' => $data['third_name_ar'],
                'third_name_en' => $data['third_name_en'],
                'last_name_ar' => $data['last_name_ar'],
                'last_name_en' => $data['last_name_en'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'image' => $image,
                'image_flag' => 0,
                'complete' => 1,
                'mobile' => $data['mobile'],
                'identity_no' => $data['identity_no'],
                'user_type_id' => $user_type_id,
            ]);
            Admin::create([
                'user_id' => $user->id,
                'directorate_id' => $data['directorate_id']
            ]);
            if ($user)
            {
                $user->role()->attach($userRole->id);
                $user->permission()->attach($userRole->permission->pluck('id')->toArray());
            }
            DB::commit();
            return $user;
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => __('messages.error')]);
        }
    }

    /**
     *  show student registration form
     */
    public function showStudentRegistrationForm()
    {
        $geoPlaces = GeoPlace::select('id','name_ar','name_en')->where('status',1)->get();
        return view('auth.studentRegisterForm',compact('geoPlaces'));
    }

    public function showTeacherSupervisorRegisterForm()
    {
        $user_id = Session::get('user');
        $user = Employee::find($user_id);
        if($user)
        {
            $geoPlaces = GeoPlace::select('id','name_ar','name_en')->where('status',1)->get();
            $levels = Level::select('id','name_ar','name_en')->where('status',1)->get();

            $grades = Grade::with('child')
                ->where('status',1)
                ->whereNull('parent_id')
                ->get();
            $subjects = Subject::with('child')
                ->where('status',1)
                ->whereNull('parent_id')
                ->get();

            return view('auth.supervisorRegisterForm',compact('geoPlaces','levels','grades','subjects','user'));
        }
        else{
            return redirect()->route('auth.userType')->with('error', __('messages.notFoundUser'));
        }

    }

    /**
     * @param StudentRequest $request
     * register function for student
     * @return RedirectResponse
     */
    public function studentRegister(StudentRegisterRequest $request)
    {
        event(new Registered($user = $this->createStudent($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * register function for Student
     * @param array $data
     * @return mixed
     */
    protected function createStudent(array $data)
    {
        $studentRole = Role::select('*')->where('slug', 'student')->first();
        $user_type_id = UserType::select('id')->where('name_en', 'student')->first()->id;

        if ($data['gender'] == 1)
            $image = 'male.png';
        else
            $image = 'female.png';

        try {
            DB::beginTransaction();
            $user = User::create([
                'name_ar' => $data['first_name_ar'] . ' ' . $data['last_name_ar'],
                'name_en' => $data['first_name_en'] . ' ' . $data['last_name_en'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name_ar' => $data['first_name_ar'],
                'first_name_en' => $data['first_name_en'],
                'second_name_ar' => $data['second_name_ar'],
                'second_name_en' => $data['second_name_en'],
                'third_name_ar' => $data['third_name_ar'],
                'third_name_en' => $data['third_name_en'],
                'last_name_ar' => $data['last_name_ar'],
                'last_name_en' => $data['last_name_en'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'image' => $image,
                'image_flag' => 0,
                'complete' => 1,
                'mobile' => $data['mobile'],
                'identity_no' => $data['identity_no'],
                'user_type_id' => $user_type_id,
            ]);
            $student = Student::create
            ([
                'user_id' => $user->id,
                'directorate_id' => $data['directorate_id'],
                'school_id' => $data['school_id'],
            ]);
            if ($user) {
                $user->role()->attach($studentRole->id);
                $user->permission()->attach($studentRole->permission->pluck('id')->toArray());
            }
            DB::commit();
            return $user;
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => __('messages.error')]);
        }
    }

    /**
     * @param SupervisorTeacherRequest $request
     * register function for teacher and supervisor
     * @return RedirectResponse
     */
    public function teacherSupervisorRegister(SupervisorTeacherRequest $request)
    {
        event(new Registered($user = $this->createTeacherSupervisor($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * create user for teacher or supervisor
     * @param array $data
     * @return mixed
     */
    protected function createTeacherSupervisor(array $data)
    {
        $supervisorRole = Role::select('*')->where('slug','supervisor')->first();
        $userRole = Role::select('*')->where('slug','user')->first();
        $userPermission = $userRole->permission->pluck('id')->toArray();
        $supervisorPermission = $supervisorRole->permission->pluck('id')->toArray();
        $teacherRole = Role::select('*')->where('slug','teacher')->first();
        $teacherPermission = $teacherRole->permission->pluck('id')->toArray();
        $user1 = Employee::where('identity_no',$data['identity_no'])->first();
        if($user1->job == 'مشرف تربوي')
            $user_type_id = UserType::select('id')->where('name_en', 'supervisor')->first()->id;
        elseif($user1->job == 'معلم')
            $user_type_id = UserType::select('id')->where('name_en', 'teacher')->first()->id;

        if($data['gender'] == 1)
            $image = 'male.png';
        else
            $image = 'female.png';

        try {
            DB::beginTransaction();
            $user = User::create([
                'name_ar' => $data['first_name_ar'] . ' ' . $data['last_name_ar'],
                'name_en' => $data['first_name_en'] . ' ' . $data['last_name_en'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name_ar' => $data['first_name_ar'],
                'first_name_en' => $data['first_name_en'],
                'second_name_ar' => $data['second_name_ar'],
                'second_name_en' => $data['second_name_en'],
                'third_name_ar' => $data['third_name_ar'],
                'third_name_en' => $data['third_name_en'],
                'last_name_ar' => $data['last_name_ar'],
                'last_name_en' => $data['last_name_en'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'image' => $image,
                'image_flag' => 0,
                'complete' => 1,
                'mobile' => $data['mobile'],
                'identity_no' => $data['identity_no'],
                'user_type_id' => $user_type_id,
            ]);
            if($data['levels'] !=null)
            {
                $user->level()->attach($data['levels']);
            }
            if($data['grades'] !=null)
            {
                $user->grade()->attach($data['grades']);
            }
            if($data['subjects'] !=null)
            {
                $user->subject()->attach($data['subjects']);
            }
            if($user)
            {
                if($user1)
                {
                    if ($user1->job == 'معلم')
                    {
                        $teacher = Teacher::create([
                            'user_id'=> $user->id,
                            'directorate_id' => $data['directorate_id'],
                            'school_id' => $data['school_id'],
                        ]);
                        $user->role()->attach($teacherRole->id);
                        $user->permission()->attach($teacherPermission);
                    }
                    elseif ($user1->job == 'مشرف تربوي')
                    {
                        $supervisor = Supervisor::create([
                            'user_id'=> $user->id,
                            'directorate_id' => $data['directorate_id'],
                        ]);
                        $user->role()->attach($supervisorRole->id);
                        $user->permission()->attach($supervisorPermission);
                    }
                    else
                    {
                        $user->role()->attach($userRole->id);
                        $user->permission()->attach($userPermission);
                    }
                }
                else
                {
                    $user->role()->attach($userRole->id);
                    $user->permission()->attach($userPermission);
                }
            }

            DB::commit();
            Session::forget('user');
            return $user;
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => __('messages.error')]);
        }
    }
}
