@extends('dashboard.layouts.enjaz-layouts.layout')
@section('content')
    <div class="container file_view mt-5 profile cpanel">
        <div class="d-flex flex-column video-show mt-3 order-0 card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-9 d-flex flex-column justify-content-sm-center justify-content-md-center text-center"
                     style="background-color: #109f99;
                     color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: -32px;">
                    <h4 class="my-auto text-white size-18 py-2" >{{__('enjaz.enjazCpanel')}}</h4>
                </div>
            </div>
        </div>
        <div class="d-flex">
            @include('dashboard.layouts.enjaz-sidebar')
            <div class="main-content" style="max-width: 90%; width:80%">
                <div class=" d-flex justify-content-center">
                    <div class="container-fluid ">
                        <!-- personal data  -->
                        <section class="row section width-80" style="display: block;">
                            <!-- Page Heading -->
                            <div class="section-title d-sm-flex align-items-center justify-content-between mb-4 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.personalData')}} </h1>
                            </div>
                            <div class="row">
                                <div class="about-text padd-15">
                                    <h3>
                                        @if($experience)
                                            <span>
                                                {{$experience->job->name}}
                                                @if($experience->job->name == 'معلم')
                                                    <span class="slash">/</span>
                                                        {{$experience->user->teacher->school->name_ar}}
                                                    <span class="slash">/</span>
                                                        {{$experience->user->teacher->directorate->name_ar}}
                                                @elseif($experience->job->name == 'مشرف تربوي')
                                                        <span class="slash">/</span>
                                                        {{$experience->user->supervisor->directorate->name_ar}}
                                                    @else
                                                    <span class="slash">/</span>
                                                    {{$experience->user->admin->directorate->name_ar}}
                                                @endif
                                            </span>
                                        @endif
                                    </h3>
                                    <div class="bio mt-3">
                                        <div class="d-flex">
                                            <h4>نبذة</h4>
                                            @if($bio)
                                            <a href="" class="edit-btn me-2 mt-1" data-id="{{$bio->id}}" data-bs-toggle="modal" data-bs-target="#edit-bio-eModal">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            @else
                                                <a href="" class="create-btn me-2 mt-1" data-bs-toggle="modal"
                                                   data-bs-target="#add-bio-eModal">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <p class=" text-end">
                                            @if($bio)
                                                {{$bio->info}}
                                            @else
                                                أضف نبذة عنك
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="personal-info padd-15">
                                        <div class="row">
                                            <div class="info-item padd-15">
                                                <p> رقم الهوية : <span>{{$user->identity_no}}</span></p>
                                            </div>
                                            <div class="info-item padd-15">
                                                <p>  العمر : <span>{{\Carbon\Carbon::parse($user->birth_date)->age}}</span></p>
                                            </div>
                                            @if($user_qualifications)
                                                <div class="info-item padd-15">
                                                    <p>  التخصص الجامعي : <span>{{$user_qualifications->specialization->name}}</span></p>
                                                </div>
                                                <div class="info-item padd-15">
                                                    <p>  الدرجة : <span>{{$user_qualifications->qualification->name}}</span></p>
                                                </div>
                                                <div class="info-item padd-15">
                                                    <p>  الجامعة  : <span>{{$user_qualifications->university->name}}</span></p>
                                                </div>
                                            @endif
                                            <div class="info-item padd-15">
                                                <p>  البريد الالكتروني  : <span>{{$user->email}}</span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد مشاهدات الملف</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fas fa-eye"></i>
                                                <p>
                                                    {{$user->profile_views}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد المقالات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fa fa-newspaper"></i>
                                                <p>
                                                    {{$article_count}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد المبادرات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fa fa-feather"></i>
                                                <p>
                                                    6
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد الإنجازات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fa fa-sun"></i>
                                                <p>
                                                    10
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد  الإعجابات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fas fa-thumbs-up"></i>
                                                <p>
                                                    33
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد التعليقات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fas fa-comment"></i>
                                                <p>
                                                    29
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 3rem">
                                <div class="buttons  d-flex justify-content-center">
                                    <a href="{{route('bios.exportPdf')}}" class="custom-btn ms-1"><i class="fas fa-download"></i> السيرة الذاتية</a>
                                    <a href="{{route('bios.show')}}" target="_blank" class="custom-btn ms-1"><i class="fas fa-download"></i> عرض</a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.bios.create')
    @include('dashboard.enjaz.bios.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/bio.js')}}"></script>
@endsection
