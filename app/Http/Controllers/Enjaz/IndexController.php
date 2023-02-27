<?php

namespace App\Http\Controllers\Enjaz;

use App\Http\Controllers\Controller;
use App\Models\Enjaz\Course;
use App\Models\Enjaz\Experience;
use App\Models\Enjaz\Membership;
use App\Models\Enjaz\Skill;
use App\Models\Enjaz\UserAward;
use App\Models\Enjaz\UserLanguage;
use App\Models\Enjaz\UserQualification;
use App\Models\User;

class IndexController extends Controller
{
    public function index($name_en)
    {
        return view('enjaz.index',compact('name_en'));
    }

    public function getMemberships()
    {
        $memberships = Membership::where(['user_id'=>1,'status'=>1])->get();
        $viewRender = view('enjaz.membership',compact('memberships'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    public function getLanguages()
    {
        $user_languages = UserLanguage::where(['user_id'=>1,'status'=>1])->get();
        $viewRender = view('enjaz.languages',compact('user_languages'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    public function getSkills()
    {
        $skills = Skill::where(['user_id'=>1,'status'=>1])->get();
        $viewRender = view('enjaz.skills',compact('skills'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    public function getCourses()
    {
        $courses = Course::where(['user_id'=>1,'status'=>1])->get();
        $viewRender = view('enjaz.courses',compact('courses'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    public function getExperiences()
    {
        $experiences = Experience::where(['user_id'=>1,'status'=>1])->with('job')->get();
        $viewRender = view('enjaz.experiences',compact('experiences'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }

    public function getQualifications(){
        $qualifications = UserQualification::where(['user_id'=>1,'status'=>1])->with('qualification','university','specialization','graduated_country')->get();
        $viewRender = view('enjaz.qualifications',compact('qualifications'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));

    public function getAwards()
    {
        $awards = UserAward::where(['user_id'=>1,'status'=>__('enjaz.published')])->with('award')->get();
        $viewRender = view('enjaz.awards',compact('awards'))->render();
        return response()->json(array('success' => true, 'html' => $viewRender));
    }
}
