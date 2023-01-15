<div class="app-sidebar__user">
    @if(Storage::exists('/public/profile/'.$authUser->image) && $authUser->image_flag == 1)
        <a href="{{route('home')}}">
            <img class="app-sidebar__user-avatar"
                 src="{{url('/storage/profile/'.$authUser->image)}}" alt="User Image"
                 width="40px" height="40px">
        </a>
    {{--@elseif(\App\Models\Rawafed\SocialAccount::where('user_id',$authUser->id) && $authUser->image_flag == 0)
        <a href="{{route('home')}}">
            <img class="app-sidebar__user-avatar"
                 src="{{$authUser->image}}" alt="User Image"
                 width="40px" height="40px">
        </a>--}}
    @else
        <a href="{{route('home')}}">
            <img class="app-sidebar__user-avatar"
                 src="{{url('/template/icons/'.$authUser->image)}}" alt="User Image"
                 width="40px" height="40px">
        </a>
    @endif
    <div>
        @if(isset($authUser))
            <p class="app-sidebar__user-name">
                <span>{{ __('dashboard.welcome') }}</span>
                @if($authUser->first_name_ar != null)
                    {{app()->getLocale()=== 'ar' ? $authUser->first_name_ar . ' '.$authUser->last_name_ar  :  $authUser->first_name_en. ' '. $authUser->last_name_en}}
                @else
                    {{app()->getLocale()=== 'ar' ?$authUser->name_ar : $authUser->name_en}}
                @endif
            </p>
        @endif
        @if(isset($authUser->role))
            <p class="app-sidebar__user-designation">{{app()->getLocale()=== 'ar' ? $authUser->role[0]->name_ar :$authUser->role[0]->name_en }}</p>
        @endif
    </div>
</div>
