<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\ExperienceRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\enjaz\Experience;
use App\Models\Enjaz\Job;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    //use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $jobs = Job::where('status',1)->get();
        $experiences = Experience::with('job:id,name')->orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.experiences.index',compact('experiences','jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ExperienceRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        if($request->job_id == -1){
            $job = Job::create($request->except('_token'));
            $request['job_id'] = $job->id;
        }
        Experience::create($request->except('_token'));

        return redirect()->route('experiences.index')->with('success', __('enjaz.successAdd'));
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
     * @return \Illuminate\Http\JsonResponse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $experience = Experience::where('id',$id)->with('job:id,name')->first();
        if(!$experience)
            return redirect()->route('experiences.index')->with('error', __('enjaz.error'));

        //$jobs = Job::select('id','name')->where('status',1)->get();
        return response()->json($experience);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ExperienceRequest $request, $id)
    {
        $experience = Experience::find($id);
        if(!$experience)
            return redirect()->route('experiences.index')->with('error', __('enjaz.error'));

        $experience->update($request->except('_token'));

        return redirect()->route('experiences.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        if (!$experience)
            return redirect()->route('experiences.index')->with('error', __('enjaz.error'));
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * change status
     * @param $status
     * @param $experience_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$experience_id)
    {
        $experience = Experience::find($experience_id);
        $experience->status = $status;
        $experience->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
