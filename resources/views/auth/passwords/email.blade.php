{{--@extends('layouts.app')--}}
@extends('auth.layouts.loginLayout')
@section('content')
<div class="container bk_all_page mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-4 col-9 text-center mx-auto" style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: 0px;">
            <h4 class="my-auto text-white size-18 py-2" >
                <i class="fa fa-lg fa-fw fa-lock"></i> {{ __('dashboard.resetPassword') }}
            </h4>

        </div>
        <h6 class="color_home text-center size-18 mt-2">اختر طريقة استعادة كلمة المرور</h6>
    </div>
    <div class="row justify-content-center mt-5">
       <div class="col-3 d-flex flex-column justify-content-center">
           <img src="{{asset('rawafed/assent/imgs/logo.webp')}}" class="p-2 mx-auto" style="width: 95px; height: 95px;" alt="play">
           <a class="btn btn_login w-100 rounded-pill disabled" href="#" style="line-height: 35px;">
              حساب روافد
           </a>
       </div>
        <div class="col-3 d-flex flex-column justify-content-center">
            <img src="{{asset('rawafed/assent/imgs/logoXW.png')}}" class="p-2 mx-auto" alt="play">
            <a class="btn btn_login w-100 rounded-pill disabled" href="#" style="line-height: 35px;">
                نظام الدخول الموحد
            </a>
        </div>
        <div class="col-3 d-flex flex-column justify-content-center">
            <i class="fa fa-google my-2 text-center" style="font-size: 79px; color: #E8505B"></i>
            <a class="btn btn_login w-100 rounded-pill" href="#" style="line-height: 35px;">
              حساب جوجل
            </a>
        </div>
       {{-- <div class="col-2 d-flex flex-column justify-content-center">
            <a class="btn btn_login w-100 rounded-pill" href="#" style="line-height: 35px;">
                انشاء حساب جديد
            </a>
        </div>--}}
    </div>
    <div class="row pb-5 mt-5">
        <div class="col-md-5 mx-auto">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="forget-form contact_Us " action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="group">
                    {{--<label class="control-label">{{ __('dashboard.emailAddress') }}</label>--}}
                    <label class="  text-gr size-16">{{ __('dashboard.email') }}</label>
                    <input id="email" type="email" class="  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>                    <span class="highlight"></span>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               {{-- <div class="group">


                    <h6 class="control-label">{{ __('dashboard.email') }}</h6>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>--}}
                <div class="form-group d-flex  justify-content-center mt-3">
                    <button class="btn btn_login w-75 rounded-pill btn-block" style="line-height: 15px" type="submit">
                        <i class="fa fa-unlock fa-lg fa-fw"></i>
                        {{ __('dashboard.sendResetLink') }}</button>
                </div>
                <div class="form-group text-center mt-3 color_home">
                    <p class="  mb-0 color_home size-14 "><a href="{{route('login')}}" class="color_home size-14">
                            <i class="fa fa-angle-right fa-fw"></i>{{ __('dashboard.backToLogin') }}</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
