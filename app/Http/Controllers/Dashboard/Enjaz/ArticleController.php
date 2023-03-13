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
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $content_type = ContentType::where('name','المقالات')->first();
        $classifications = Classification::where(['content_type_id'=>$content_type->id,'status'=>1])->get();
        $contents = Content::where('content_type_id',$content_type->id)->with('classification','article','content_file','user:id,name_ar,name_en')->paginate(2);
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
        $content_type = ContentType::where('name','المقالات')->first();
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
            if ($request->has('saveDraft'))
            {
                $request['status'] = "مسودة";
            }
            else if ($request->has('publish'))
            {
                $request['status'] = 'منشور';
            }
            if (!$request->has('allow_comments'))
                $request->request->add(['allow_comments' => 0]);
            else
                $request->request->add(['allow_comments' => 1]);

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
    public function edit($id){
        $content = Content::where('id',$id)->with('classification','article','content_file','user:id,name_ar')->first();
        if(!$content)
            return redirect()->route('articles.index')->with('error', __('enjaz.error'));

        return response()->json($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $content = Content::where('id',$id)->with('classification','article','content_file','user:id,name_ar')->first();
        if ($request->has('editSaveDraft') && $request->editSaveDraft == null)
        {
            $request->request->add([
                'status' => "مسودة",
            ]);
        }
        else if ($request->has('editPublish') && $request->editPublish == null)
        {
            $request->request->add([
                'status' => "منشور",
            ]);
        }
        /**
         * use DB transaction to store in multiple tables
         */
        try
        {
            DB::beginTransaction();

            if($request->classification_id == -1)
            {
                $classification = Classification::create(['name' => $request->name,'content_type_id' => $content->content_type_id]);
                $request['classification_id'] = $classification->id;
            }
            $content->update($request->except('_token'));
            $content->article->update($request->except('_token'));

            if ($request->has('image') && $request->image != null)
            {
                if(File::exists($content->content_file->first()->AttPath))
                    File::delete(public_path($content->content_file->first()->AttPath));

                ContentFile::updateContentFile($request,'articles',$content->content_file->first()->id);
            }

            DB::commit();
            return redirect()->route('articles.index')->with('success', __('enjaz.successUpdate'));
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
    public function destroy($id,$folder)
    {
        $content = Content::where('id',$id)->with('content_file')->first();
        if (!$content)
            return redirect()->back()->with('error', __('enjaz.error'));

        $files = $content->content_file->whereNotNull('extension');
        foreach($files as $file){
            $path=ContentFile::getFilePath($folder,$file);
            if(File::exists(public_path($path))){
                File::delete(public_path($path));
            }
        }
        $content->delete();
        return redirect()->back()->with('success', __('enjaz.successDelete'));
    }

    /**
     * change status
     * @param $status
     * @param $content_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$content_id)
    {
        $content = Content::find($content_id);
        $content->status = $status;
        $content->save();
        return response()->json(['success'=>'Content status change successfully.']);
    }
}
