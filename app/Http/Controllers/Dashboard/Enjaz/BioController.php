<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\BioRequest;
use App\Models\Enjaz\Article;
use App\Models\Enjaz\Bio;
use App\Models\Enjaz\Content;
use App\Models\Enjaz\ContentType;
use App\Models\Enjaz\Experience;
use App\Models\Enjaz\UserQualification;
use App\Models\User;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $bio= Bio::where('user_id' , Auth::id())->first();
        $bio= Bio::where('user_id' , 1)->first();
        $user_qualifications = UserQualification::where('user_id' , 1)
            ->with(['qualification','university','specialization'])
            ->orderBy('graduation_year', 'desc')->first();
        $experience = Experience::where(['user_id'=> 1,'to'=> null])->first();
        $user = User::where('id' ,$bio->user_id )->first();//Auth::user();
        $article_count = Content::where('user_id',$bio->user_id)
            ->where('content_type_id',ContentType::where('name','المقالات')->first()->id)
            ->count();
        return view('dashboard.enjaz.bios.index',compact('bio','user_qualifications','experience','user','article_count'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BioRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);

        Bio::create($request->except('_token'));

        return redirect()->route('bios.index')->with('success', __('enjaz.successAdd'));
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
        $bio = Bio::where('user_id',1)->first();
        if(!$bio)
            return redirect()->route('bios.index')->with('error', __('enjaz.error'));

        return response()->json($bio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BioRequest $request, $id)
    {
        $bio = Bio::find($id);
        if(!$bio)
            return redirect()->route('bios.index')->with('error', __('enjaz.error'));

        $bio->update($request->except('_token'));

        return redirect()->route('bios.index')->with('success', __('enjaz.successUpdate'));
    }
}
