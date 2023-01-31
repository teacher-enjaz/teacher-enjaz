@extends('dashboard.layouts.enjaz-layouts.layout')

@section('title'){{__('enjaz.experiences')}} | {{__('enjaz.teacherEnjaz')}}@endsection

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
                            <!-- skills data start -->
                            <!-- Page Heading -->
                            <div class="section-title  mb-2 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.skills')}}</h1>
                                <p class="section-hint">
                                    {{__('enjaz.addSkill')}}
                                </p>
                            </div>
                            <div class=" d-flex justify-content-between align-items-center ">
                                <a href="" class="custom-btn add-btn mt-4 " data-bs-toggle="modal" data-bs-target="#add-skill-eModal">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <div class="toggle-flip toggle-flip-section ms-4">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="flip-indecator" data-toggle-on="عرض في ملف الإنجاز" data-toggle-off=" إخفاء من ملف الإنجاز"></span>
                                    </label>
                                </div>
                            </div>

                            <!-- DataTales Example -->
                            <div class="card shadow my-4 p-0">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{__('enjaz.skills')}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="sampleTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('enjaz.skill')}}</th>
                                                <th>{{__('enjaz.skill_level')}}</th>
                                                <th>{{__('enjaz.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($skills->count() > 0)
                                                @foreach($skills as $index=>$skill)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td> {{$skill->name}}</td>
                                                        <td class="">
                                                            <div class="progress">
                                                                <div class="progress-bar " role="progressbar" style="width: {{$skill->skill_level.'%'}}"
                                                                     aria-valuemin="0" aria-valuemax="100">{{$skill->skill_level.'%'}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <div class="toggle-flip">
                                                                <label>
                                                                    <input type="checkbox" data-id="{{$skill->id}}"
                                                                           {{ $skill->status ? 'checked' : '' }}
                                                                           class="skill-status">
                                                                    <span class="flip-indecator"
                                                                          data-toggle-on="{{__('enjaz.published')}}"
                                                                          data-toggle-off="{{__('enjaz.unpublished')}}">
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <a href="" class="edit-btn ms-1"
                                                               data-id="{{$skill->id}}"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#edit-skill-eModal"
                                                               data-bs-toggle="tooltip"
                                                               data-bs-html="true"
                                                               title="{{__('enjaz.update')}} ">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a class="delete-btn delete-trashed" href="{{route('skills.destroy',$skill->id)}}" type="button">
                                                                <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-html="true" title="{{__('enjaz.delete')}}">
                                                                </i>
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
                            <!-- skills data end -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.skills.create')
    @include('dashboard.enjaz.skills.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/skill.js')}}"></script>
@endsection
