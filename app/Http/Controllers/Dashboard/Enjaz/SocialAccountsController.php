<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\SocialAccountsRequest;
use App\Http\Requests\Enjaz\SocialPlatformsRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Enjaz\SocialAccounts;
use App\Models\Enjaz\SocialPlatforms;
use Database\Seeders\CriteriaSeeder;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class SocialAccountsController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = SocialPlatforms::where('status',1)->get();
        $socialAcoounts = SocialAccounts::with('socialPlatforms:id,name')->orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.social-accounts.index',compact('socialAcoounts','platforms'));
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
     * @param SocialAccountsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SocialAccountsRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        SocialAccounts::create($request->except('_token'));
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
        $account = SocialAccounts::find($id);
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
        $account = SocialAccounts::find($id);
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
        $account = SocialAccounts::find($id);
        if (!$account)
            return redirect()->route('social-accounts.index')->with('error', __('enjaz.error'));
        $account->delete();
        return redirect()->route('social-accounts.index')->with('success', __('enjaz.successDelete'));
    }

    public function status($status,$account_id)
    {
        $account = SocialAccounts::find($account_id);
        $account->status = $status;
        $account->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
