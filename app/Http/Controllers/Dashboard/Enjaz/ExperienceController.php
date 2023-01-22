<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\ExperienceRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\enjaz\Experience;
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
        $experiences = Experience::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.experiences.index',compact('experiences'));
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
        //$this->changeStatus($request);
        $request->request->add([
            'user_id' => 1,//Auth::id(),
            'status' => 1,
        ]);
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
        $experience = Experience::find($id);
        if(!$experience)
            return redirect()->route('experiences.index')->with('error', __('enjaz.error'));

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
