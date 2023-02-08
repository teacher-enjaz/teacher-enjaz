<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\ContentTypeRequest;
use App\Models\Enjaz\ContentType;

class ContentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $content_types = ContentType::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.content-types.index',compact('content_types'));
    }

    /**
     * @param ContentTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContentTypeRequest $request)
    {
        ContentType::create($request->except('_token'));
        return redirect()->route('content-types.index')->with('success',__('enjaz.successAdd'));
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $content_type = ContentType::find($id);
        if(!$content_type)
            return redirect()->route('content-types.index')->with('error',__('enjaz.error'));
        return response()->json($content_type);
    }

    /**
     * @param ContentTypeRequest $request
     * @param $id
     */
    public function update(ContentTypeRequest $request, $id)
    {
        $content_type = ContentType::find($id);
        if(!$content_type)
            return redirect()->route('content-types.index')->with('error', __('enjaz.error'));
        $content_type->update($request->except('_token'));

        return redirect()->route('content-types.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content_type = ContentType::find($id);
        if (!$content_type)
            return redirect()->route('content-types.index')->with('error', __('enjaz.error'));
        $content_type->delete();
        return redirect()->route('content-types.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * @param $status
     * @param $content_type_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$content_type_id)
    {
        $content_type = ContentType::find($content_type_id);
        $content_type->status = $status;
        $content_type->save();
        return response()->json(['success'=>'Course Status changed successfully.']);
    }
}
