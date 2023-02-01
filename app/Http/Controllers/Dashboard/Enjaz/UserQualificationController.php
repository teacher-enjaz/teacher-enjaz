<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\UserQualificationRequest;
use App\Models\Enjaz\GraduatedCountry;
use App\Models\Enjaz\Qualification;
use App\Models\Enjaz\Specialization;
use App\Models\Enjaz\University;
use App\Models\Enjaz\UserQualification;
use Illuminate\Support\Facades\DB;

class UserQualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $qualifications = Qualification::where('status',1)->get();
        $specializations = Specialization::where('status',1)->get();
        $universities = University::where('status',1)->get();
        $graduated_countries = GraduatedCountry::where('status',1)->get();

        $user_qualifications = UserQualification::with(['qualification:id,name',
            'university:id,name',
            'specialization:id,name',
            'graduated_country:id,name',
            ])->where('user_id',1)
            ->orderBy('created_at','desc')
            ->get();

        return view('dashboard.enjaz.user-qualifications.index',compact(
            'user_qualifications',
            'qualifications',
            'specializations',
            'universities',
            'graduated_countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserQualificationRequest $request)
    {
        /**
         * use DB transaction to store in multiple tables
         */
        try
        {
            DB::beginTransaction();
            $request->request->add([
                'user_id' => 1,//Auth::id(),
            ]);
            if($request->qualification_id == -1)
            {
                $qualification = Qualification::create(['name'=> $request->qualificationName]);
                $request['qualification_id'] = $qualification->id;
            }
            if($request->specialization_id == -1)
            {
                $specialization = Specialization::create(['name'=> $request->specializationName]);
                $request['specialization_id'] = $specialization->id;
            }
            if($request->university_id == -1)
            {
                $university = University::create(['name'=> $request->universityName]);
                $request['university_id'] = $university->id;
            }
            if($request->graduated_country_id == -1)
            {
                $graduated_country = GraduatedCountry::create(['name'=> $request->graduatedCountryName]);
                $request['graduated_country_id'] = $graduated_country->id;
            }
            UserQualification::create($request->except('_token'));

            DB::commit();
            return redirect()->route('user-qualifications.index')->with('success', __('enjaz.successAdd'));
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' =>$e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_qualification = UserQualification::find($id);
        if(!$user_qualification)
            return redirect()->route('user-qualifications.index')->with('error', __('enjaz.error'));

        return response()->json($user_qualification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserQualificationRequest $request, $id)
    {
        /**
         * use DB transaction to store in multiple tables
         */
        try
        {
            DB::beginTransaction();
            $user_qualification = UserQualification::find($id);
            if(!$user_qualification)
                return redirect()->route('user-qualifications.index')->with('error', __('enjaz.error'));
            if($request->qualification_id == -1)
            {
                $qualification = Qualification::create(['name'=> $request->qualificationName]);
                $request['qualification_id'] = $qualification->id;
            }
            if($request->specialization_id == -1)
            {
                $specialization = Specialization::create(['name'=> $request->specializationName]);
                $request['specialization_id'] = $specialization->id;
            }
            if($request->university_id == -1)
            {
                $university = University::create(['name'=> $request->universityName]);
                $request['university_id'] = $university->id;
            }
            if($request->graduated_country_id == -1)
            {
                $graduated_country = GraduatedCountry::create(['name'=> $request->graduatedCountryName]);
                $request['graduated_country_id'] = $graduated_country->id;
            }
            $user_qualification->update($request->except('_token'));
            DB::commit();
            return redirect()->route('user-qualifications.index')->with('success', __('enjaz.successUpdate'));
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' =>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_qualification = UserQualification::find($id);
        if (!$user_qualification)
            return redirect()->route('user-qualifications.index')->with('error', __('enjaz.error'));
        $user_qualification->delete();
        return redirect()->route('user-qualifications.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * change status
     * @param $status
     * @param $experience_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$user_qualification_id)
    {
        $user_qualification = UserQualification::find($user_qualification_id);
        $user_qualification->status = $status;
        $user_qualification->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
