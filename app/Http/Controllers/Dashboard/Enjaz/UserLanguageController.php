<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\SkillRequest;
use App\Http\Requests\Enjaz\UserLanguageRequest;
use App\Models\Enjaz\Language;
use App\Models\Enjaz\Skill;
use App\Models\Enjaz\UserLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserLanguageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $languages = Language::where('status',1)->get();
        $user_languages = UserLanguage::where('user_id',1)->with('language')->orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.user-languages.index',compact('languages','user_languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     *
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
    public function store(UserLanguageRequest $request)
    {
        $this->changeStatus($request);
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        if($request->language_id == -1)
        {
            $language = Language::create($request->except('_token'));
            $request['language_id'] = $language->id;
        }
        UserLanguage::create($request->except(['_token','name']));

        return redirect()->route('user-languages.index')->with('success', __('enjaz.successAdd'));

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
        $user_language = UserLanguage::find($id);
        if(!$user_language)
            return redirect()->route('user-languages.index')->with('error', __('enjaz.error'));

        return response()->json($user_language);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserLanguageRequest $request, $id)
    {
        $user_language = UserLanguage::find($id);
        if(!$user_language)
            return redirect()->route('user-languages.index')->with('error', __('enjaz.error'));

        $this->changeStatus($request);
        $user_language->update($request->except('_token'));

        return redirect()->route('user-languages.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_language = UserLanguage::find($id);
        if (!$user_language)
            return redirect()->route('user-languages.index')->with('error', __('enjaz.error'));
        $user_language->delete();
        return redirect()->route('user-languages.index')->with('success', __('enjaz.successDelete'));
    }
    public function status($status,$user_language_id)
    {
        $user_language = UserLanguage::find($user_language_id);
        $user_language->status = $status;
        $user_language->save();
        return response()->json(['success'=>'User Language status change successfully.']);
    }

    public function changeStatus($request)
    {
        if (!$request->has('is_native'))
            return $request->request->add(['is_native' => 0]);
        else
            return $request->request->add(['is_native' => 1]);
    }
}
