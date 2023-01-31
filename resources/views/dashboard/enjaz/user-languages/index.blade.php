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
                            <!-- user-languages data start -->
                            <!-- Page Heading -->
                            <div class="section-title mb-2 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.user-languages')}}</h1>
                                <p class="section-hint">
                                    {{__('enjaz.addLanguages')}}
                                </p>
                            </div>
                            <div class=" d-flex justify-content-between align-items-center">
                                <a href="" class="custom-btn add-btn mt-4 " data-bs-toggle="modal" data-bs-target="#add-lang-eModal">
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
                                    <h6 class="m-0 font-weight-bold text-primary">{{__('enjaz.user-languages')}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="sampleTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('enjaz.language')}}</th>
                                                <th>{{__('enjaz.level')}}</th>
                                                <th>{{__('enjaz.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($user_languages->count() > 0)
                                                @foreach($user_languages as $index=>$user_language)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>
                                                            {{$user_language->language->name}}
                                                            <span class="lang-type">
                                                                {{ $user_language->is_native ? __('enjaz.native') :__('enjaz.non-native') }}
                                                            </span>

                                                        </td>
                                                        <td>
                                                            <div class="progress ">
                                                                <div class="progress-bar" role="progressbar"
                                                                     style="width: {{round(\PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages::average($user_language->reading_level,$user_language->writing_level,$user_language->speaking_level),0).'%'}}"
                                                                     aria-valuemin="0" aria-valuemax="100">
                                                                    {{round(\PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages::average($user_language->reading_level,$user_language->writing_level,$user_language->speaking_level),0).'%'}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <div class="toggle-flip">
                                                                <label>
                                                                    <input type="checkbox" data-id="{{$user_language->id}}"
                                                                           {{ $user_language->status ? 'checked' : '' }}
                                                                           class="language-status">
                                                                    <span class="flip-indecator"
                                                                          data-toggle-on="{{__('enjaz.published')}}"
                                                                          data-toggle-off="{{__('enjaz.unpublished')}}">
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <a href="" class="edit-btn ms-1" data-id="{{$user_language->id}}"
                                                               data-bs-toggle="modal" data-bs-target="#edit-lang-eModal"
                                                               data-bs-toggle="tooltip" data-bs-html="true" title="{{__('enjaz.update')}}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{route('user-languages.destroy',$user_language->id)}}" type="button"
                                                               class="delete-btn delete-trashed" ><i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-html="true" title="{{__('enjaz.delete')}}"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- user-languages data end -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.user-languages.create')
    @include('dashboard.enjaz.user-languages.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/custom-ranges.js')}}"></script>
    <script src="{{asset('enjaz/js/user-languages.js')}}"></script>
@endsection
