@if(isset($authUser))
    <div class=" col-12 col-md-3 my-2 d-flex mb-2 mb-lg-0">
        <div class="d-flex">
            <div class="nav-link  text-center " aria-current="page" >
                <a href="{{route('site.userProfile',$authUser->id)}}">
                    @if(Storage::exists('/public/profile/'.$authUser->image) && $authUser->image_flag == 1)
                        <img src="{{url('/storage/profile/'.$authUser->image)}}" class="img-user circle rounded-circle" alt="">
                    @elseif($authUser->image_flag == 0 && \App\Models\Rawafed\SocialAccount::where('user_id',$authUser->id)->first() == null)
                        <img src="{{url('/template/icons/'.$authUser->image)}}" class="img-user circle rounded-circle" alt="">
                    @elseif(\App\Models\Rawafed\SocialAccount::where('user_id',$authUser->id)->first() != null && $authUser->image_flag == 0)
                        <img src="{{$authUser->image}}" class="img-user circle rounded-circle" alt="">
                    @elseif(\App\Models\Rawafed\SocialAccount::where('user_id',$authUser->id)->first() != null && $authUser->image_flag == 1)
                        <img src="{{url('/storage/profile/'.$authUser->image)}}" class="img-user circle rounded-circle" alt="">
                    @endif
                </a>
            </div>
            <div class="my-auto">
                <a href="{{route('site.userProfile',$authUser->id)}}" class="text-brouwn d-flex flex-column mb-0 size-14">
                    {{app()->getLocale() == 'ar' ? $authUser->name_ar : $authUser->name_en}}
                    <small class="badge  bg-warning text-brouwn  rounded-pill size-11">
                        {{app()->getLocale() == 'ar' ? $authUser->role[0]->name_ar : $authUser->role[0]->name_en}}
                    </small>
                </a>
            </div>
        </div>
        <ul class="d-flex px-0 me-auto my-auto">
            <li class="nav-item d-flex justify-content-center align-items-center ">
                <x-site-notifications />
                <a class="nav-link  text-center px-1 tooltiplink" data-title="لوحة التحكم" aria-current="page" href="{{route('home')}}" target="_blank">
                    <i class="fa fa-cog btn_icon rounded-circle" aria-hidden="true"></i>
                </a>
                <a class="nav-link  text-center px-1 tooltiplink" data-title="تسجيل خروج" aria-current="page" href="{{route('logout')}}">
                    <i class="fa fa-sign-out btn_icon rounded-circle" aria-hidden="true"></i>
                </a>
                {{--<button class="navbar-toggler px-0 mx-auto  btn_icon rounded-circle " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars"></i>
                </button>--}}
            </li>
        </ul>
    </div>
@elseif(isset($user))
    <div class=" col-12 col-md-3 my-2 d-flex mb-2 mb-lg-0">
        <div class="d-flex">
            <div class="nav-link  text-center " aria-current="page" >
                <a href="{{route('site.userProfile',$user->id)}}">
                    @if(Storage::exists('/public/profile/'.$user->image) && $user->image_flag == 1)
                        <img src="{{url('/storage/profile/'.$user->image)}}" class="img-user circle rounded-circle" alt="">
                    @else
                        <img src="{{$user->gender == 1 ? url('/template/icon/male.png'):url('/template/icon/female.png')}}"
                             class="img-user circle rounded-circle" alt="">
                    @endif
                </a>
            </div>
            <div class="my-auto">
                <a href="{{route('site.userProfile',$user->id)}}" class="text-brouwn d-flex flex-column mb-0 size-14">
                    {{app()->getLocale() == 'ar' ? $user->name_ar : $user->name_en}}
                    <small class="badge  bg-warning text-brouwn  rounded-pill size-11">
                        {{app()->getLocale() == 'ar' ? $user->role[0]->name_ar : $user->role[0]->name_en}}
                    </small>
                </a>
            </div>
        </div>

        <ul class="d-flex px-0 me-auto my-auto">
            <li class="nav-item d-flex justify-content-center align-items-center ">
                {{--<x-site-notifications />--}}
                <a class="nav-link  text-center px-1 " aria-current="page" href="{{route('home')}}" target="_blank">
                    <i class="fa fa-cog btn_icon rounded-circle" aria-hidden="true"></i>
                </a>
                <a class="nav-link  text-center px-1 " aria-current="page" href="{{route('logout')}}">
                    <i class="fa fa-sign-out btn_icon rounded-circle" aria-hidden="true"></i>
                </a>
                {{--<button class="navbar-toggler px-0 mx-auto  btn_icon rounded-circle " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars"></i>
                </button>--}}
            </li>
        </ul>
    </div>
@else
    <div class=" col-12 col-md-3 d-flex justify-content-center me-auto mb-2 mb-lg-0  ">
        <a href="{{route('login')}}" class="d-flex  btn_login rounded-pill text-center justify-content-center mx-1">
            <i class="fa fa-sign-in justify-content-center my-auto ms-2" style="font-size: 22px;"></i>{{__('dashboard.Login')}}
        </a>
        <a href="{{route('auth.userType')}}"class="d-flex  btn_add_user  rounded-pill text-center justify-content-center mx-1" target="_blank">
            <i class="fa fa-user-plus justify-content-center my-auto ms-2" style="font-size: 22px;"></i>{{ __('dashboard.createNewAccount') }}
        </a>
    </div>
@endif
