<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\SocialAccountsRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Enjaz\SocialPlatform;
use App\Models\Enjaz\UserSocialAccount;

class UserSocialAccountController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = SocialPlatform::all();
        $social_accounts = UserSocialAccount::with('social_platform:id,name')
            ->orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.social-accounts.index',compact('social_accounts','platforms'));
    }

    /**
     * @param SocialAccountsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SocialAccountsRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        UserSocialAccount::create($request->except('_token'));
        return redirect()->route('social-accounts.index')->with('success', __('enjaz.successAdd'));
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
        $account = UserSocialAccount::find($id);
        if(!$account)
            return redirect()->route('social-accounts.index')->with('error', __('enjaz.error'));

        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialAccountsRequest $request, $id)
    {
        $account = UserSocialAccount::find($id);
        if(!$account)
            return redirect()->route('social-accounts.index')->with('error', __('enjaz.error'));
        $account->update($request->except('_token'));

        return redirect()->route('social-accounts.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = UserSocialAccount::find($id);
        if (!$account)
            return redirect()->route('social-accounts.index')->with('error', __('enjaz.error'));
        $account->delete();
        return redirect()->route('social-accounts.index')->with('success', __('enjaz.successDelete'));
    }

    public function status($status,$account_id)
    {
        $account = UserSocialAccount::find($account_id);
        $account->status = $status;
        $account->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
