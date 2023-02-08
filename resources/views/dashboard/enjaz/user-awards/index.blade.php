@extends('dashboard.layouts.enjaz-layouts.layout')

@section('title'){{__('enjaz.awardsCompetitions')}} | {{__('enjaz.teacherEnjaz')}}@endsection

@section('content')
    <div class="container file_view mt-5 profile cpanel">
        <div class="d-flex flex-column video-show mt-3 order-0 card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-9 d-flex flex-column justify-content-sm-center justify-content-md-center text-center"
                     style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px;
                     position: relative; top: -36px;">
                    <h4 class="my-auto text-white size-18 py-2" >{{__('enjaz.enjazCpanel')}}</h4>
                </div>
            </div>
        </div>
        <div class="d-flex">
            @include('dashboard.layouts.enjaz-sidebar')
            <div class="main-content" style="width: 90%;">
                <div class=" d-flex justify-content-center">
                    <div class="container-fluid ">
                        <!-- educational data  -->
                        <section class="row section">
                            <!-- articels data start -->
                            <!-- Page Heading -->
                            <div class="section-title mb-2 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.awardsCompetitions')}}</h1>
                                <p class="section-hint">
                                    {{__('enjaz.addCompetitions')}}
                                </p>
                            </div>
                            <div class=" d-flex justify-content-between align-items-center">
                                <a href="" class="create-btn custom-btn add-btn mt-4"
                                   data-bs-toggle="modal" data-bs-target="#add-award-eModal">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <div class="toggle-flip toggle-flip-section ms-4">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="flip-indecator"
                                              data-toggle-on="عرض في ملف الإنجاز"
                                              data-toggle-off=" إخفاء من ملف الإنجاز"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- DataTales Example -->
                            <div class="row">
                                @if($user_awards->count() > 0)
                                    @foreach($user_awards as $index=>$user_award)
                                        <div class="col-12 col-md-4 ">
                                            <div class="card articel-card shadow my-4 p-0">
                                                <div class="card-header py-3">
                                                    <a href="single_initiative.html">
                                                        <h6 class="m-0 font-weight-bold text-primary">{{$user_award->award->name}}</h6>
                                                    </a>
                                                </div>
                                                <div class="card-body p-0 pb-2">
                                                    <a href="single_initiative.html">
                                                        <div class="initiative-img d-flex justify-content-center shadow-dark">
                                                            <img src="{{ url('storage/awards',$user_award->image) }}" alt="{{$user_award->award->name}}" class="image-fluid " style="height: 20rem !important;">
                                                        </div>
                                                    </a>
                                                    <div class="initiative-footer  px-4 mt-2">
                                                        <div class="aricel-data-1 d-flex justify-content-between">
                                                            <div  class="publisher">
                                                                <i class="fas fa-user"></i>
                                                                <span>{{$user_award->award->donor}}</span>
                                                            </div>
                                                            <div class="date">
                                                                <i class="fas fa-calendar-week"></i>
                                                                {{$user_award->obtained_date}}
                                                            </div>
                                                        </div>
                                                        <div class="aricel-data-1 d-flex justify-content-between mt-3">
                                                            <div  class="publisher">
                                                                <span>{{$user_award->award->description}}</span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="procedures d-flex justify-content-between  mt-3">
                                                            <div class="status align-middle">
                                                                <p>{{$user_award->status}}</p>
                                                            </div>
                                                            <div class="procedure d-flex justify-content-center">
                                                                <div class="toggle-flip ms-1">
                                                                    <label>
                                                                        <input type="checkbox" {{$user_award->status == 'منشور'? 'checked':''}}>
                                                                        <span class="flip-indecator"
                                                                              data-toggle-on="نشر"
                                                                              data-toggle-off="إلغاء النشر ">
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <a href=""  data-id="{{$user_award->id}}" class="edit-btn edit-btn"
                                                                   data-bs-toggle="modal" data-bs-target="#edit-award-eModal"
                                                                   data-bs-toggle="tooltip" data-bs-html="true"
                                                                   title="{{__('enjaz.update')}} ">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="" class="delete-btn">
                                                                    <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-html="true" title="حذف ">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category">
                                                    <span>{{__('enjaz.awardTag')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- articels data end -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.user-awards.create')
    @include('dashboard.enjaz.user-awards.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/user_award.js')}}"></script>
@endsection