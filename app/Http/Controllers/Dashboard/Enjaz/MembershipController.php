<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\MembershipRequest;
use App\Models\Enjaz\Membership;
use App\Models\Enjaz\Organization;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $organizations = Organization::where('status',1)->get();
        $memberships = Membership::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.memberships.index',compact('memberships','organizations'));
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
    public function store(MembershipRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        if($request->organization_id == -1)
        {
            $organization = Organization::create(['name' => $request->organization_name]);
            $request['organization_id'] = $organization->id;
        }

        Membership::create($request->except('_token'));

        return redirect()->route('memberships.index')->with('success', __('enjaz.successAdd'));
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
        $membership = Membership::find($id);
        if(!$membership)
            return redirect()->route('memberships.index')->with('error', __('enjaz.error'));

        return response()->json($membership);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MembershipRequest $request, $id)
    {
        $membership = Membership::find($id);
        if(!$membership)
            return redirect()->route('memberships.index')->with('error', __('enjaz.error'));
        if($request->organization_id == -1)
        {
            $organization = Organization::create(['name' => $request->organization_name]);
            $request['organization_id'] = $organization->id;
        }
        $membership->update($request->except('_token'));

        return redirect()->route('memberships.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);
        if (!$membership)
            return redirect()->route('memberships.index')->with('error', __('enjaz.error'));
        $membership->delete();
        return redirect()->route('memberships.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * change status
     * @param $status
     * @param $membership_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$membership_id)
    {
        $membership = Membership::find($membership_id);
        $membership->status = $status;
        $membership->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
