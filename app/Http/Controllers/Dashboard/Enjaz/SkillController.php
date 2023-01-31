<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\SkillRequest;
use App\Models\Enjaz\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $skills = Skill::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.skills.index',compact('skills'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);

        Skill::create($request->except('_token'));

        return redirect()->route('skills.index')->with('success', __('enjaz.successAdd'));

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
        $skill = Skill::find($id);
        if(!$skill)
            return redirect()->route('skills.index')->with('error', __('enjaz.error'));

        return response()->json($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, $id)
    {
        $skill = Skill::find($id);
        if(!$skill)
            return redirect()->route('skills.index')->with('error', __('enjaz.error'));

        $skill->update($request->except('_token'));

        return redirect()->route('skills.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (!$skill)
            return redirect()->route('skills.index')->with('error', __('enjaz.error'));
        $skill->delete();
        return redirect()->route('skills.index')->with('success', __('enjaz.successDelete'));
    }
    public function status($status,$skill_id)
    {
        $skill = Skill::find($skill_id);
        $skill->status = $status;
        $skill->save();
        return response()->json(['success'=>'Skill status change successfully.']);
    }
}
