{{--
<header class="app-header">
    <x-site-information />

    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="{{__('dashboard.search')}}">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Languages Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show user-languages">
                <i class="fa fa-language"></i>
                <span>{{LaravelLocalization::getCurrentLocaleNative()}}</span>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <div class="app-notification__content">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a rel="alternate" hreflang="{{ $localeCode }}" class="dropdown-item"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </ul>
        </li>
        <!--Notification Menu-->
        <x-notifications-menu />
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <i class="fa fa-user fa-lg"></i>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <x-profile />
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>{{ __('dashboard.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>

--}}

<!-- Start Header -->

<section class="header  shadow-none" id="header">
    <!-- Start Top Header -->
    <nav class="navbar navbar-expand-lg shadow-none ">
        <div class="container justify-content-cente">
            <a class="col-12 col-md-3 my-2  justify-content-md-start justify-content-center  navbar-brand d-flex" href="{{route('site.index')}}">
                @if(isset($siteInfo))
                    <img src="{{url('/storage/information/'.$siteInfo->logo)}}" class="ms-2 img-logo">
                @else
                    <img src="{{asset('rawafed/assent/imgs/logo.png')}}" class="ms-2 img-logo">
                @endif
                <h4 class="color_home size-20 mb-0 " >
                    @if(isset($siteInfo))
                        {{app()->getLocale() == 'ar' ? $siteInfo->site_name_ar: $siteInfo->site_name_en}}
                    @else
                        {{__('site.rawafedGate')}}
                    @endif
                    <br>
                    <small class="size-12 color-black"> {{__('site.slogan')}} </small>
                </h4>
            </a>
            <form class="col-12 col-md-3 my-2 justify-content-center d-flex rounded-pill p-1" method="GET" action="{{route('site.search')}}">
                <input name="search" class="form-control me-2 border-0 border-left  size-11 " type="search" placeholder="{{__('site.search')}}" aria-label="Search">
                <a class="text-center" href="#" onclick="this.parentNode.submit();">
                    <i class="fa fa-search btn_search rounded-circle"></i>
                </a>
            </form>
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <a href="{{route('tv.index')}}" class="d-flex justify-content-center btn_web rounded-pill py-1 ">
                    <img src="{{asset('rawafed/assent/imgs/final22-01.png')}}"  class="my-auto me-3 position-relative" style="width:13% !important; right: 0" >
                    <h1 class="size-16 text-center me-4 text my-auto"  style=" display: grid;">
                        {{__('site.rawafedTV')}}
                    </h1>
                </a>
            </div>
            <x-auth-user/>
        </div>
    </nav>
    <!-- End Top Header -->

    <!-- Start Nav_link Header -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container navbar-light  menu-bar  ">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav text-center mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('site.index')) active @endif" aria-current="page" href="{{route('site.index')}}">
                          <span class="home">
                            <i class="fa fa-home size-24"></i>
                          </span>
                        </a>
                    </li>
                    <x-all-resources/>
                    <li class="nav-item ">
                        <a class="nav-link @if(url()->current() == route('site.eCards')) active @endif" href="{{route('site.eCards')}}">{{__('site.cards')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('site.videoLessons')) active @endif" href="{{route('site.videoLessons')}}">{{__('site.picturedLessons')}} </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(url()->current() == route('site.fileMaterials')) active @endif" href="{{route('site.fileMaterials')}}">{{__('site.enrichmentMaterials')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('site.books')) active @endif " href="{{route('site.books')}}">{{__('site.books')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('site.classroom')) active @endif" href="{{route('site.classroom')}}">{{__('site.classRoom')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('site.ministry-exam-forms')) active @endif" href="{{route('site.ministry-exam-forms')}}">{{__('site.examForms')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('site.contactUs')) active @endif" href="{{route('site.contactUs')}}">{{__('site.contactUs')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Nav_link Header -->

    <!-- Start Hero-->
    @if(Route::currentRouteName() == 'site.index')
        <div class="hero container pb-5">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 text-center mt-4">
                        <p class="hello-text wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;" >{{__('site.welcome')}}</p>
                    </div>
                    <div class="col-md-12 mx-auto d-flex flex-md-row  flex-column  justify-content-center  text-center " style="color: #066f6b;">
                        <p class=" size-16 mb-0 wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;"> {{Carbon\Carbon::now()->dayName}}  {{Carbon\Carbon::now()->day}}  {{Carbon\Carbon::now()->monthName}}  {{Carbon\Carbon::now()->year}}  |
                            {{$hijri_date}} هـ</p>
                        <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <p class="mx-2 justify-content-center size-16" >| <i class="fa fa-clock-o"></i>
                                {{Carbon\Carbon::now()->minute}} : {{Carbon\Carbon::now()->hour >12 ? Carbon\Carbon::now()->hour -12 :Carbon\Carbon::now()->hour  }}
                                <span class="size-14 pt-3">{{Carbon\Carbon::now()->hour+3 >12 ? __('site.pm') :__('site.am') }}</span></p>
                            <p class=" size-16" >{{-- | <i class="fa fa-cloud"></i> 15 --}}</p>
                        </div>
                    </div>
                    <div class="form-check form-switch justify-content-center text-center col-md-12 mx-auto">
                        <label class="form-check-label text-center d-block" for="flexSwitchCheckChecked">تبديل طريقة العرض</label>
                    </div>
                    <div class="form-check form-switch justify-content-center text-center col-md-12 mx-auto">
                        <input class="form-check-input text-center d-block" type="checkbox" name="showType" value="1" checked>
                    </div>
                </div>
                <div class="" style="display: none" id="grades">
                    @if($levels->count() > 0)
                        <div class="container-fluid">
                            <div class="row left-content header-text" data-wow-duration="1s" data-wow-delay="1s">
                                <!--بداية المرحلة -->
                                @if($levels->count() > 0)
                                    @foreach($levels as $level)
                                        <div class=" col-12 col-md-4 container-fluid ">
                                            <ul class="px-md-0">
                                                <li>
                                                    <div class="d-flex  position-relative wow bounceInUp animated">
                                                        <h3 class="size-14 text-brouwn  text-end  mx-auto bk_orng rounded-pill py-2 px-3" style="z-index: 1;">
                                                            {{app()->getLocale() == 'ar' ? $level->name_ar : $level->name_en}}
                                                        </h3>
                                                        <hr class="w-100 me-auto position-absolute" style="top: 3px; height: 1px;">
                                                    </div>
                                                </li>
                                                <ul class="row d-flex justify-content-around px-0" >
                                                    @if($level->grade->count() > 0)
                                                        @foreach($level->grade as $grade)
                                                            @if($grade->parent_id == null && $grade->child->count() == 0)
                                                                <li class="col-4 col-md-4 text-center d-flex align-items-center justify-content-center  btn_icon_stage rounded-pill m-1 wow bounceInUp animated">
                                                                    <a href="{{route('site.gradeSubject',$grade->id)}}" class="my-auto size-14 py-2 text-color-stage">
                                                                        {{app()->getLocale() == 'ar' ? $grade->name_ar : $grade->name_en}}
                                                                    </a>
                                                                </li>
                                                            @else
                                                                @foreach($grade->child as $child)
                                                                    <li class=" wow bounceInUp animated col-4 col-md-6 text-center d-flex align-items-center justify-content-center  btn_icon_stage rounded-pill m-1 " >
                                                                        <a href="{{route('site.gradeSubject',$child->id)}}" class=" my-auto size-14 text-white py-2 text-color-stage">
                                                                            {{app()->getLocale() == 'ar' ? $child->name_ar : $child->name_en}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row {{--d-flex --}}justify-content-evenly mt-5" id="resources">
                    <div class="col-6 col-md-2 col-sm-4  align-content-center my-3 wow bounceInUp animated">
                        <a href="{{route('site.eCards')}}" class="esection">
                            <div class="box align-content-center flex-column">
                                <div class="circle rounded-circle mx-auto mt-2 d-flex align-items-start flex-row flex-wrap">
                                    <img src="{{asset('rawafed/assent/imgs/checklist.png')}}" alt="">
                                </div>
                                <div class="txtSection text-center pt-3">
                                    {{__('site.cards')}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-2 col-sm-4  align-content-center my-3 wow bounceInUp animated">
                        <a href="{{route('site.videoLessons')}}" class="esection">
                            <div class="box align-content-center flex-column">
                                <div class="circle rounded-circle mx-auto mt-2 d-flex align-items-start flex-row flex-wrap">
                                    <img src="{{asset('rawafed/assent/imgs/Play.png')}}" alt="">
                                </div>
                                <div class="txtSection text-center pt-3">
                                    {{__('site.picturedLessons')}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-2 col-sm-4  align-content-center my-3 wow bounceInUp animated">
                        <a href="{{route('site.fileMaterials')}}" class="esection">
                            <div class="box align-content-center flex-column">
                                <div class="circle rounded-circle mx-auto mt-2 d-flex align-items-start flex-row flex-wrap">
                                    <img src="{{asset('rawafed/assent/imgs/document.png')}}" alt="">
                                </div>
                                <div class="txtSection text-center pt-3">
                                    {{__('site.fileMaterials')}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-2 col-sm-4  align-content-center my-3 wow bounceInUp animated">
                        <a href="{{route('site.books')}}" class="esection">
                            <div class="box align-content-center flex-column">
                                <div class="circle rounded-circle mx-auto mt-2 d-flex align-items-start flex-row flex-wrap">
                                    <img src="{{asset('rawafed/assent/imgs/book.png')}}" alt="">
                                </div>
                                <div class="txtSection text-center pt-3">
                                    {{__('site.books')}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(Route::currentRouteName() == 'site.fileMaterials' ||
        Route::currentRouteName() == 'site.videoLessons' ||
        Route::currentRouteName() == 'site.eCards' ||
        Route::currentRouteName() == 'site.books')
        <x-grades/>
@endif
<!-- End Hero-->
</section>

<!-- End Header -->

