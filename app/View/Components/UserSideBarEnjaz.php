<?php

namespace App\View\Components;

use App\Models\Enjaz\Bio;
use App\Models\Enjaz\Content;
use App\Models\Enjaz\ContentType;
use App\Models\Enjaz\Experience;
use App\Models\Enjaz\UserQualification;
use App\Models\Enjaz\UserSocialAccount;
use App\Models\Rawafed\FollowUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserSideBarEnjaz extends Component
{
    public $authUser,$bio,$user_qualifications,$experience,$article_count,$achievement_count,$initiative_count,$social_accounts,$followers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authUser = User::where('id' ,1)->first();//Auth::user();
        $this->bio = Bio::where('user_id' , 1)->first();
        $this->user_qualifications = UserQualification::where('user_id' , 1)
            ->with(['qualification','university','specialization'])
            ->orderBy('graduation_year', 'desc')->first();
        $this->experience = Experience::where(['user_id'=> 1,'is_present'=> 1])->first();
        if(!$this->experience)
            $this->experience = Experience::where(['user_id'=> 1,'is_present'=> 0])->orderBy('to','desc')->first();
        $this->article_count = Content::where('user_id',1)
            ->where('content_type_id',ContentType::where('name','المقالات')->first()->id)
            ->count();
        $this->achievement_count = Content::where('user_id',1)
            ->where('content_type_id',ContentType::where('name','الإنجازات')->first()->id)
            ->count();
        $this->initiative_count = Content::where('user_id',1)
            ->where('content_type_id',ContentType::where('name','المبادرات')->first()->id)
            ->count();
        $this->social_accounts = UserSocialAccount::with('social_platform:id,name')
            ->orderBy('created_at','desc')->get();
        $this->followers = FollowUser::where('user_id', 1)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-side-bar-enjaz');
    }
}
