
@extends('auth.layouts.loginLayout')

@section('content')
    <div class="row login-box bk_all_page mt-4" >
        <div class="col-md-4 col-9 text-center mx-auto" style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: 0px;">
            <h4 class="my-auto text-white size-18 py-2" >
                <i class="fa fa-lg fa-fw fa-user"></i>{{ __('dashboard.Login') }}
            </h4>
        </div>
        <div class="container-fluid mt-4 ">
            <div class="row">
                <form class=" col-12 col-md-4  mx-auto contact_Us  " action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="login-head color_home size-18 text-center">تسجيل الدخول باستخدام حسابك على روافد</h3>
                        <div class="my-2 rounded float-right d-flex mx-auto">
                            <span class="white rounded  d-flex"></span>
                            <span class="green rounded  d-flex"></span>
                            <span class="yellow rounded d-flex"></span>
                        </div>
                    </div>
                    <div class="group ">
                        <label class="  text-gr size-16">{{ __('dashboard.emailAddress') }}</label>
                        <input id="email" type="email" class="group @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="highlight"></span>
                        <span class="bar"></span>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="group">
                        <label class=" text-gr size-16 ">{{ __('dashboard.password') }}</label>
                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="highlight"></span>
                        <span class="bar"></span>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="group">
                        <div class="d-flex justify-content-between mt-2">
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox"><span class="label-text size-12 text-gr">{{ __('dashboard.rememberMe') }}</span>
                                </label>
                            </div>

                            {{--@if (Route::has('password.request'))
                                <p class="semibold-text mb-2">
                                    <a href="{{ route('password.request') }}" class="color_home size-12">{{ __('dashboard.forgotPassword') }}</a>
                                </p>
                            @endif--}}
                        </div>
                    </div>

                    <div class="form-group btn-container">
                        <button class="btn  btn-block btn_login w-100 rounded-pill align-self-center" style="line-height: 15px;" type="submit">
                            <i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('dashboard.Login') }}</button>
                    </div>

                    <div class="d-flex justify-content-center mt-3 mx-auto">
                        <a class="text-center  mx-auto color_home size-14 " href="{{route('auth.userType')}}">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            {{ __('dashboard.createNewAccount') }}
                        </a>
                    </div>
                </form>
                <div class="col-12 col-md-2 d-flex align-items-center justify-content-center ">
                    <h2 class="text-white text-center size-20 text_or rounded-circle">أو</h2>
                    <hr class="me-auto h-100 position-absolute" style=" height: 1px; width: .3px">
                </div>
                <form class=" col-12 col-md-4  mx-auto  " action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="login-head color_home size-18 text-center">تسجيل الدخول باستخدام حسابك على:</h3>
                        <div class="my-2 rounded float-right d-flex mx-auto">
                            <span class="white rounded  d-flex"></span>
                            <span class="green rounded  d-flex"></span>
                            <span class="yellow rounded d-flex"></span>
                        </div>
                    </div>
                    <div class="form-group btn-container mt-3">
                        <a class="btn btn_login p-0 w-100 rounded-pill" href="{{route('ssoLogin')}}" style="background-color: #ea7b2a/*line-height: 35px;*/">
                            <img src="{{asset('rawafed/assent/imgs/logoXW2.png')}}" class=" mx-auto" style="width: 30px; height: 30px;" alt="play"> نظام الدخول الموحد</a>
                    </div>
                    <div class="form-group btn-container mt-3">
                        <a class="btn btn_login w-100 rounded-pill" href="{{url('login/google')}}" style="line-height: 35px; background-color: #E8505B;">
                            <i class="fa fa-google fa-lg fa-fw size-18"></i>{{ __('dashboard.GoogleAccountLogin') }}</a>
                    </div>
                </form>
            </div>
            <div class="row me-5 mt-5   contact_Us">
                <div class="col-10 d-flex ">
                    <i class="fa fa-lightbulb-o color_home fa-2x ms-2"></i>
                    <h4 class="my-auto color_home size-18" >تعلم:</h4>
                    <div class="rounded float-right d-flex me-2 my-auto">
                        <span class="bk_home_color rounded  d-flex"  ></span>
                        <span class="green rounded  d-flex" ></span>
                        <span class="yellow rounded d-flex"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex">

                    <ul class="">
                        <li class="links_lib my-2">
                            <a href="{{url('user-guide.pdf')}}" class="text-gr"> <i class="fa fa-angle-right ms-2"></i>  دليل استخدام بوابة روافد</a>
                        </li>
                        <li class=" links_lib my-2">
                            <a href="#" class="text-gr"><i class="fa fa-angle-right ms-2"></i>فيديو تدريبي لاستخدام بوابة روافد التعليمية </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
