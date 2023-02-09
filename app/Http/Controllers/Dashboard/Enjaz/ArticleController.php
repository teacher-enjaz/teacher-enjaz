<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\ArticleRequest;
use App\Http\Requests\Enjaz\ExperienceRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Enjaz\Article;
use App\Models\Enjaz\Classification;
use App\Models\Enjaz\Content;
use App\Models\Enjaz\ContentFile;
use App\Models\Enjaz\ContentType;
use App\Models\enjaz\Experience;
use App\Models\Enjaz\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $content_type = ContentType::where('name','مقالات')->first();
         $classifications = Classification::where(['content_type_id'=>$content_type->id,'status'=>1])->get();

        $contents = Content::where('content_type_id',$content_type->id)->
            with('classification','article','content_file','user:id,name_ar')->get();
        return view('dashboard.enjaz.articles.index',compact('classifications','contents'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        /**
         * use DB transaction to store in multiple tables
         */
        $content_type = ContentType::where('name','مقالات')->first();
        try
        {
            DB::beginTransaction();
            $request->request->add([
                'user_id' => 1,//Auth::id(),
                'content_type_id' => $content_type->id,
            ]);
            if($request->classification_id == -1)
            {
                $classification = Classification::create(['name' => $request->name,'content_type_id' => $content_type->id]);
                $request['classification_id'] = $classification->id;
            }
            $content = Content::create($request->except('_token'));
            $request->request->add([
                'content_id' => $content->id,
            ]);
            Article::create($request->except('_token'));
            ContentFile::createContentFile($request,'articles');

            DB::commit();
        return redirect()->route('articles.index')->with('success', __('enjaz.successAdd'));
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' =>$e]);
        }
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
     * @return \Illuminate\Http\JsonResponse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $experience = Experience::find($id);//where('id',$id)->with('job:id,name')->first();
        if(!$experience)
            return redirect()->route('experiences.index')->with('error', __('enjaz.error'));

        return response()->json($experience);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ExperienceRequest $request, $id)
    {
        /**
         * use DB transaction to store in multiple tables
         */
        try
        {
            DB::beginTransaction();
            $experience = Experience::find($id);
            if(!$experience)
                return redirect()->route('experiences.index')->with('error', __('enjaz.error'));

            if($request->job_id == -1)
            {
                $job = Job::create(['name' => $request->name]);
                $request['job_id'] = $job->id;
            }
            $experience->update($request->except('_token'));

            DB::commit();
            return redirect()->route('experiences.index')->with('success', __('enjaz.successUpdate'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        if (!$experience)
            return redirect()->route('experiences.index')->with('error', __('enjaz.error'));
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * change status
     * @param $status
     * @param $experience_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$experience_id)
    {
        $experience = Experience::find($experience_id);
        $experience->status = $status;
        $experience->save();
        return response()->json(['success'=>'Experience status change successfully.']);
    }
}
