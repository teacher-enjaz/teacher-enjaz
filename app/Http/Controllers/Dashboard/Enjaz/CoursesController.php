<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Models\Enjaz\Course;
use Illuminate\Http\Request;
use App\Http\Requests\Enjaz\CourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at','desc')->get();
        return view('dashboard.enjaz.courses.index',compact('courses'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $request->request->add([
            'user_id' => 1,//Auth::id(),
        ]);
        Course::create($request->except('_token'));

        return redirect()->route('courses.index')->with('success', __('enjaz.successAdd'));
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
        $course = Course::find($id);
        if(!$course)
            return redirect()->route('courses.index')->with('error', __('enjaz.error'));

        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);
        if(!$course) return redirect()->route('courses.index')->with('error', __('enjaz.error'));
        $course->update($request->except('_token'));
        return redirect()->route('courses.index')->with('success', __('enjaz.successUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!$course)
            return redirect()->route('courses.index')->with('error', __('enjaz.error'));
        $course->delete();
        return redirect()->route('courses.index')->with('success', __('enjaz.successDelete'));
    }

    /**
     * @param $status
     * @param $course_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($status,$course_id)
    {
        $course = Course::find($course_id);
        $course->status = $status;
        $course->save();
        return response()->json(['success'=>'Lesson status change successfully.']);
    }
}
