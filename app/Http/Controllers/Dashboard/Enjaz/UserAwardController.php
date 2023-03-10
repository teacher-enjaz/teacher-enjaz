<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\UserAwardRequest;
use App\Models\Enjaz\Award;
use App\Models\Enjaz\UserAward;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\DB;

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
        try
        {
            DB::beginTransaction();
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
                $request['status'] = 'منشور';
            }
            $user_award = UserAward::create($request->except('_token'));

            if ($request->hasFile('image'))
            {
                $image = $this->saveNewImage($request->image,'awards');
                $user_award->image = $image;
            }
            $user_award->save();
            DB::commit();
            return redirect()->route('user-awards.index')->with('success', __('enjaz.successAdd'));
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' =>$e]);
        }
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
        try
        {
            DB::beginTransaction();
            if ($request->award_id == -1) {
                $award = Award::create([
                    'name' => $request->name,
                    'donor' => $request->donor,
                    'description' => $request->description
                ]);
                $request['award_id'] = $award->id;
            }
            if ($request->has('saveDraft')) {
                $request['status'] = "مسودة";
            } else if ($request->has('publish')) {
                $request['status'] = 'منشور';
            }
            $userAward->award_id = $request->award_id;
            $userAward->youtube_link = $request->youtube_link;
            $userAward->obtained_date = $request->obtained_date;

            $userAward->status = $request['status'];
            if ($request->hasFile('image')) {
                $icon = $this->saveNewImage($request->image, 'awards');
                $userAward->image = $icon;
            }
            $userAward->update();
            DB::commit();
            return redirect()->route('user-awards.index')->with('success', __('enjaz.successAdd'));
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
        $user_award = UserAward::find($id);
        if (!$user_award)
            return redirect()->route('user-awards.index')->with('error', __('enjaz.error'));
        $user_award->delete();
        return redirect()->route('user-awards.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * change status
     * @param $status
     * @param $user_award_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$user_award_id)
    {
        $user_award = UserAward::find($user_award_id);
        $user_award->status = $status;
        $user_award->save();
        return response()->json(['success'=>'Award status change successfully.']);
    }
}
