<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\SocialPlatformsRequest;
use App\Http\Requests\Enjaz\UpdateSocialPlatformsRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Enjaz\SocialPlatform;
use Illuminate\Support\Facades\File;


class SocialPlatformController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialPlatforms = SocialPlatform::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.social-platforms.index',compact('socialPlatforms'));
    }

    /**
     * @param SocialPlatformsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SocialPlatformsRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        $platform = SocialPlatform::create($request->except('_token'));
        if ($request->has('image'))
        {
            $icon = $this->saveNewImage($request->image,'socialPlatforms');
            //save photos in database
        }

        $platform->image = $icon;
        $platform->save();

        return redirect()->route('social-platforms.index')->with('success', __('enjaz.successAdd'));
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
        $platform = SocialPlatform::find($id);
        if(!$platform)
            return redirect()->route('social-platforms.index')->with('error', __('enjaz.error'));

        return response()->json($platform);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialPlatformsRequest $request, $id)
    {
        $platform = SocialPlatform::find($id);

        if(!$platform)
            return redirect()->route('social-platforms.index')->with('error', __('enjaz.error'));
        $platform->name = $request->name;

        if ($request->hasFile('image'))
        {
            $path = 'storage/socialPlatforms/'.$platform->image;
            if(File::exists($path))
                File::delete($path);
            $icon = $this->saveNewImage($request->image,'socialPlatforms');
            $platform->image = $icon;
        }
        $platform->update();
        return redirect()->route('social-platforms.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platform = SocialPlatform::find($id);
        $path = 'storage/socialPlatforms/'.$platform->image;
        if(File::exists($path))
            File::delete($path);

        if (!$platform)
            return redirect()->route('social-platforms.index')->with('error', __('enjaz.error'));
        $platform->delete();
        return redirect()->route('social-platforms.index')->with('success', __('enjaz.successDelete'));
    }

    public function status($status,$platforms_id)
    {
        $platform = SocialPlatform::find($platforms_id);
        $platform->status = $status;
        $platform->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
