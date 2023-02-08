<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\UserAwardRequest;
use App\Models\Enjaz\Award;
use App\Models\Enjaz\UserAward;
use App\Http\Traits\GeneralTrait;

class UserAwardController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $awards = Award::where('status',1)->get();
        $user_awards = UserAward::where('user_id' , 1)->orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.user-awards.index',compact('user_awards','awards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserAwardRequest $request)
    {
           $request->request->add([
               'user_id' => 1,//Auth::id(),
               'status' => "مسودة"
           ]);
           if($request->award_id == -1)
           {
               $award = Award::create([
                   'name' => $request->name,
                   'donor' => $request->donor,
                   'description' => $request->description
               ]);
               $request['award_id'] = $award->id;
           }
           if ($request->has('saveDraft'))
           {
               $request['status'] = "مسودة";
           }
           else if ($request->has('publish'))
           {
               $request['status'] = 'منشورة';
           }
           $user_award = UserAward::create($request->except('_token'));

           if ($request->hasFile('image'))
           {
               $image = $this->saveNewImage($request->image,'awards');
               $user_award->image = $image;
           }
           $user_award->save();
           return redirect()->route('user-awards.index')->with('success', __('enjaz.successAdd'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userAward = UserAward::with('award')->where('user_id',1)->find($id);
        if(!$userAward)
            return redirect()->route('user-awards.index')->with('error', __('enjaz.error'));

        return response()->json($userAward);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserAwardRequest $request, $id)
    {
        $userAward = UserAward::with('award')->find($id);
        if($request->award_id == -1)
        {
            $award = Award::create([
                'name' => $request->name,
                'donor' => $request->donor,
                'description' => $request->description
            ]);
            $request['award_id'] = $award->id;
        }
        if ($request->has('saveDraft'))
        {
            $request['status'] = "مسودة";
        }
        else if ($request->has('publish'))
        {
            $request['status'] = 'منشورة';
        }
        $userAward->award_id = $request->award_id;
        $userAward->youtube_link = $request->youtube_link;
        $userAward->obtained_date = $request->obtained_date;
        if ($request->hasFile('image'))
        {
            $icon = $this->saveNewImage($request->image,'awards');
            $userAward->image = $icon;
        }
        $userAward->update();
        return redirect()->route('user-awards.index')->with('success', __('enjaz.successAdd'));
    }


}
