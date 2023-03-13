<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\InitiativeRequest;
use App\Http\Requests\Enjaz\UpdateInitiativeRequest;
use App\Models\Enjaz\Classification;
use App\Models\Enjaz\Content;
use App\Models\Enjaz\ContentFile;
use App\Models\Enjaz\ContentType;
use App\Models\Enjaz\Initiative;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $content_type = ContentType::where('name','المبادرات')->first();
        $classifications = Classification::where(['content_type_id'=>$content_type->id,'status'=>1])->get();
        $contents = Content::where('content_type_id',$content_type->id)->with('classification','initiative','content_file','user:id,name_ar,name_en')->paginate(6);
        return view('dashboard.enjaz.initiatives.index',compact('classifications','contents'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(InitiativeRequest $request)
    {
        /**
         * use DB transaction to store in multiple tables
         */
        $content_type = ContentType::where('name','المبادرات')->first();
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

            Initiative::create($request->except('_token'));

            if ($request->new_image[0] != null)
            {
                ContentFile::createContentImages($request, 'initiatives');
            }
            if ($request->new_file[0] != null)
            {
                ContentFile::createContentFiles($request, 'initiatives');
            }
            if ($request->new_youtube[0] != null)
            {
                ContentFile::createContentVideos($request);
            }
            DB::commit();
            return redirect()->route('initiatives.index')->with('success', __('enjaz.successAdd'));
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' =>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id){

        $content = Content::where('id',$id)->with('classification','initiative','content_file','user:id,name_ar')->first();
        $imageCount = $content->content_file->where('mime','image')->count();
        $fileCount = $content->content_file->where('mime','file')->count();
        if(!$content)
            return redirect()->route('initiatives.index')->with('error', __('enjaz.error'));

        return response()->json(['data'=>$content,'count'=>$imageCount,'files'=>$fileCount]);
    }

    /**
     * @param UpdateInitiativeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateInitiativeRequest $request,$id)
    {
        $content = Content::find($id);
        if(!$content)
            return redirect()->route('initiatives.index')->with('error', __('enjaz.error'));
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


            $content->update($request->except('_token'));
            $updatedContent = Content::where('id',$id)->with('initiative','content_file')->first();

            $request->request->add(['content_id' => $updatedContent->id]);

            $updatedContent->initiative->update($request->except('_token'));

            $index=1;
            foreach($content->content_file as $file)
            {
                if($file->mime == 'youtube')
                {
                    $request->request->add([
                        'name' => $request->old_youtube[$index],
                        'description' => $request->old_youtube[$index],
                    ]);
                    ContentFile::updateContentVideo($request,$file->id);
                    $index++;
                }
            }

            if ($request->new_image[0] != null)
                ContentFile::createContentImages($request, 'initiatives');

            if ($request->new_file[0] != null)
                ContentFile::createContentFiles($request, 'initiatives');

            if ($request->new_youtube != null)
                ContentFile::createContentVideos($request);

        DB::commit();
        return redirect()->route('initiatives.index')->with('success', __('enjaz.successAdd'));
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' =>$e]);
        }
    }
}
