@extends('dashboard.layouts.enjaz-layouts.layout')

@section('title'){{__('enjaz.courses')}} | {{__('enjaz.teacherEnjaz')}}@endsection

@section('content')
    <div class="container file_view mt-5 profile cpanel">
        <div class="d-flex flex-column video-show mt-3 order-0 card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-9 d-flex flex-column justify-content-sm-center justify-content-md-center text-center"
                     style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px;
                     position: relative; top: -32px;">
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
                            <!-- experience data start -->
                            <!-- Page Heading -->
                            <div class="section-title mb-2 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.courses')}}</h1>
                                <p class="section-hint">
                                    {{__('enjaz.addCoursesEnjazCpanel')}}
                                </p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="" class="custom-btn add-btn mt-2 create-btn"
                                   data-bs-toggle="modal"
                                   data-bs-target="#add-course-eModal">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <div class="toggle-flip toggle-flip-section ms-4">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="flip-indecator"
                                              data-toggle-on="?????? ???? ?????? ??????????????"
                                              data-toggle-off=" ?????????? ???? ?????? ??????????????">
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <!-- DataTales Example -->
                        <div class="card shadow my-4 p-0">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{__('enjaz.courses')}}</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered display" id="sampleTable"
                                           width="100%" cellspacing="0" style="border-collapse:collapse;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('enjaz.course')}}</th>
                                            <th>{{__('enjaz.organizationCourse')}}</th>
                                            <th>{{__('enjaz.courseHours')}}</th>
                                            <th>{{__('enjaz.trainingDate')}}</th>
                                            <th>{{__('enjaz.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($courses->count() > 0)
                                            @foreach($courses as $index=>$course)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$course->name}}</td>
                                                    <td>{{$course->training_center}}</td>
                                                    <td>{{$course->hours}}</td>
                                                    <td>{{$course->end_date}}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="toggle-flip">
                                                            <label>
                                                                <input type="checkbox" data-id="{{$course->id}}"
                                                                       {{ $course->status ? 'checked' : '' }}
                                                                       class="course-status">
                                                                <span class="flip-indecator"
                                                                      data-toggle-on="{{__('enjaz.published')}}"
                                                                      data-toggle-off="{{__('enjaz.unpublished')}}">
                                                                    </span>
                                                            </label>
                                                        </div>
                                                        <a href="" class="edit-btn ms-1" data-bs-toggle="modal"
                                                           data-id="{{$course->id}}"
                                                           data-bs-target="#edit-course-eModal" id="edit"
                                                           data-bs-html="true" title="{{__('enjaz.update')}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="delete-btn mb-2 delete-trashed" type="button"
                                                           href="{{route('courses.destroy',$course->id)}}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <!-- experience data end -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.courses.create')
    @include('dashboard.enjaz.courses.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/course.js')}}"></script>
@endsection
