<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\BioRequest;
use App\Models\Enjaz\Bio;

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
        return view('dashboard.enjaz.cpanel',compact('bio'));
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
