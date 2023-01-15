@extends('auth.layouts.loginLayout')

@section('content')
    <div class="row  bk_all_page">

        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-4 col-9 text-center mx-auto" style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: 0px;">
                    <h4 class="my-auto text-white size-18 py-2" >
                        <i class="fa fa-lg fa-fw fa-lock"></i> {{ __('dashboard.createNewAccount') }}
                    </h4>
                </div>

            </div>
            <div class="row">
                <div class="col-12   mt-3">
                    <div class="container-fluid tile-body color_home  text-center"><h6 class="size-18">{{ __('dashboard.userType') }}</h6></div>
                    @include('dashboard.layouts.includes.alerts.errors')
                    <div class="row tile-footer d-flex justify-content-center mx-auto mt-3 pb-5">
                        <div class="col-12 col-md-3   d-flex flex-column">
                            <img src="{{asset('rawafed/assent/imgs/teacher2.png')}}" class="mx-auto" width="150px"height="150px">
                            <a class="btn_login text-center align-self-center rounded-pill mx-auto w-75 size-16 m-2" style="line-height: 46px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                {{__('dashboard.supervisor')}} -  {{__('dashboard.teacher')}}</a>
                        </div>
                        <div class="col-12 col-md-3   d-flex flex-column">
                            <img src="{{asset('rawafed/assent/imgs/studentt.png')}}" class="mx-auto" width="150px"height="150px">
                            <a class="btn_login text-center align-self-center rounded-pill size-16 m-2 mx-auto" style="line-height: 46px;" href="{{route('auth.studentRegisterForm')}}">{{__('dashboard.student')}}</a>
                        </div>
                        <div class="col-12 col-md-3   d-flex flex-column">
                            <img src="{{asset('rawafed/assent/imgs/fatherhood.png')}}" class="mx-auto" width="150px"height="150px">
                            <a class="btn_login text-center align-self-center  rounded-pill size-16 m-2 mx-auto" style="line-height: 46px;" href="{{url('register')}}">{{__('dashboard.employee')}}  </a>
                        </div>
                        <div class="col-12 col-md-3   d-flex flex-column">
                             <img src="{{asset('rawafed/assent/imgs/fatherhood.png')}}" class="mx-auto" width="150px"height="150px">
                            <a class="btn_login text-center align-self-center  rounded-pill size-16 m-2 mx-auto" style="line-height: 46px;" href="{{url('register')}}"> {{__('dashboard.parent')}}</a>
                        </div>
                    </div>

                    <div class="collapse" id="collapseExample">
                        <div class="groups pt-3">
                            <div class="d-flex flex-column justify-content-center">
                                <h3 class="login-head color_home size-18 text-center">إنشاء حساب جديد خاص بـالمشرف التربوي / معلم:</h3>
                                <div class="my-2 rounded float-right d-flex mx-auto">
                                    <span class="white rounded  d-flex"></span>
                                    <span class="green rounded  d-flex"></span>
                                    <span class="yellow rounded d-flex"></span>
                                </div>
                            </div>
                            <form name="userTypeForm" class="d-flex flex-column mx-auto my-3 pb-2"  action="{{route('auth.checkUser')}}" method="POST">
                                @csrf
                                <div class="form-row ">
                                    <div class="col-6 mx-auto d-flex flex-column">
                                        <input type="text" name="identity_no" class="" required placeholder="{{__('dashboard.enterIdentityNo')}}">
                                        @error('identity_no')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                        <button class="btn mx-auto rounded-pill py-1 btn_login my-2" type="submit" style="height: 28px; line-height: 14px;" >{{__('dashboard.ok')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row me-5 contact_Us mt-3">
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
    </div>
@endsection
