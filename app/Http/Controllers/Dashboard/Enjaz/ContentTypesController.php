<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\ContentTypeRequest;
use App\Models\Enjaz\Content;
use App\Models\Enjaz\ContentType;
use Illuminate\Http\Request;

class ContentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ContentType::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.content-types.index',compact('types'));
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
        $type = ContentType::find($id);
        if(!$type) return redirect()->route('content-types.index')->with('error',__('enjaz.error'));
        return response()->json($type);
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
        $type = ContentType::find($id);
        if (!$type)
            return redirect()->route('content-types.index')->with('error', __('enjaz.error'));
        $type->delete();
        return redirect()->route('content-types.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * @param $status
     * @param $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$type_id)
    {
        $type = ContentType::find($type_id);
        $type->status = $status;
        $type->save();
        return response()->json(['success'=>'Course Status changed successfully.']);
    }
}
