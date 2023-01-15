<div class="container-fluid">
    {{--<div class="bk-rounded"></div>--}}
    <div class="row pt-1 pb-1 d-flex justify-content-around" >
        <div class="col-12 col-md-4 d-flex wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="">
                <img src="{{asset('rawafed/assent/imgs/logo_Nx.webp')}}" alt="" style="width: 89px; height: 125px;">
            </div>
            <div class="me-3 mx-3 pt-2 ">
                <h6 class="text-white mb-3 size-14">{{__('site.ministry')}}</h6>
                <h6 class="text-white mb-3 size-14">{{__('site.Administration')}}</h6>
                <h6 class="text-white mb-3 size-14">{{__('site.eLearning')}}</h6>
                <h6 class="text-white mb-3 size-14">{{__('site.IT')}}</h6>
                @if(isset($siteInfo))
                    <h6 class="text-white mb-3 size-14"><i class="ml-1 fa fa-envelope-o color_orng ms-2"></i>{{$siteInfo->email}}</h6>
                    <h6 class="text-white mb-3 size-14"><i class="ml-1 fa fa-phone color_orng ms-2"></i>{{$siteInfo->mobile}}</h6>
                @endif
            </div>
        </div>
        <div class="col-12 col-md-4 links wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <h3 class="text-white size-24 pe-4">{{__('site.links')}}</h3>
            <ul class="row d-flex flex-row">
                <li class="text-white col-12 col-md-6 text_link my-1">
                    <a href="{{route('site.index')}}" class="text-white size-14">
                        <i class="fa fa-link ms-2 color_orng"></i>{{__('site.home')}}
                    </a>
                </li>
                <li class="text-white col-12 col-md-6 text_link my-1">
                    <a href="{{url('user-guide.pdf')}}" class="text-white size-14" target="_blank">
                        <i class="fa fa-link ms-2 color_orng"></i>
                        {{__('site.rawafedGiude')}}
                    </a>
                </li>
                @if($staticPages->count() > 0)
                    @foreach($staticPages as $page)
                        <li class="text-white col-12 col-md-6 text_link my-1">
                            <a href="{{route('site.staticPage',$page->slug)}}" class="text-white size-14" target="_blank">
                                <i class="fa fa-link ms-2 color_orng"></i>
                                {{app()->getLocale() == 'ar' ? $page->title_ar:$page->title_en}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="row border-top mx-5 py-3 mt-3 px-5 d-flex flex-column justify-content-center" >
        <div class="col-12 col-md-12 d-flex flex-column justify-content-center">
            <h3 class="text-white size-11 text-center">
                {{__('site.rawafedCopyRights')}}
            </h3>
            <div class="text-center">
                <a rel="license" style="text-decoration: none;" class="text-center font-24" target="_blank" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.ar?fbclid=IwAR2FE8fCEntGuRkthCFx8tDhfXQVpknWNGLaLi7OIxyWMNR36XzBB7hIikg" title="Creative Commons Attribution 4.0 International license">
                <span id="cc-logo" class="icon" data-toggle="tooltip" data-placement="top" data-original-title="{{__('site.CCRights')}}">
                    <img class="img-fluid" width="35px" alt="cc logo" src="{{asset('rawafed/assent/imgs/nd_white_x2@2x.png')}}"style="width: 25px; height: 25px"></span>
                    <span id="cc-icon-nd" class="icon mx-1" data-toggle="tooltip" data-placement="top" data-original-title="{{__('site.right1')}}">
                    <img class="img-fluid" width="35px" src="{{asset('rawafed/assent/imgs/nc_white_x2@2x.png')}}"style="width: 25px; height: 25px"></span>
                    <span id="cc-attribution" class="icon mx-1" data-toggle="tooltip" data-placement="top" data-original-title="{{__('site.right2')}}">
                    <img class="img-fluid" width="35px" src="{{asset('rawafed/assent/imgs/attribution_icon_white_x2@2x.png')}}"style="width: 25px; height: 25px"></span>
                </a>
                <a rel="license" style="text-decoration: none;" class="text-center font-24" target="_blank"
                   href="https://www.w3.org/WAI/standards-guidelines/wcag/">
                <span id="cc-attribution" class="icon mx-1" data-toggle="tooltip" data-placement="top" data-original-title="{{__('site.right2')}}">
                    <img class="img-fluid" width="35px" src="{{asset('rawafed/assent/imgs/accessible.png')}}" style="width: 25px; height: 25px"></span>
                </a>
            </div>
            <h6 class="text-white size-11 mt-2 text-center">الحقوق محفوظة لوزارة التربية والتعليم العالي © 2022</h6>
        </div>
        <div class="col-12 col-md-12 link-social">
            @if($socials->count()>0)
                <ul class="ps-0 d-flex justify-content-center">
                    @foreach($socials as $social)
                        <li class="my-2 ms-3">
                            <a href="{{$social->url}}" class="size-26" target="_blank">
                                <img src="{{url('/storage/information',$social->icon)}}" width="25px"  height="25px">
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <x-add-files/>
</div>
