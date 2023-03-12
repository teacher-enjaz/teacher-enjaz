@extends('dashboard.layouts.enjaz-layouts.layout')
@section('style')
    <style>
        output{
            width: 100%;
            min-height: 150px;
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 15px;
            position: relative;
            border-radius: 5px;
        }

        output .image{
            height: 150px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
        }

        output .image img{
            height: 100%;
            width: 100%;
        }

        output .image span {
            position: absolute;
            top: -4px;
            right: 4px;
            cursor: pointer;
            font-size: 22px;
            color: white;
        }

        output .image span:hover {
            opacity: 0.8;
        }

        output .span--hidden{
            visibility: hidden;
        }
    </style>
@endsection
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
            <div class="main-content mb-5" style="width: 90%;">
                <div class=" d-flex justify-content-center">
                    <div class="container-fluid ">
                        <!-- educational data  -->
                        <section class="row section">
                            <!-- achievements data start -->
                            <!-- Page Heading -->
                            <div class="section-title mb-2 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.initiatives')}}</h1>
                                <p class="section-hint">
                                    {{__('enjaz.addInitiatives')}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center ">
                                <a href="" class="custom-btn create-btn add-btn mt-4 " data-bs-toggle="modal" data-bs-target="#add-initiative-eModal">
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
                            <div class="row">
                                @if($contents->count() > 0)
                                    @foreach($contents as $index=>$content)
                                        <div class="col-12 col-md-4 ">
                                            <div class="card articel-card shadow my-4 p-0">
                                                <div class="card-header py-3">
                                                    <a href="{{url('enjaz/'.Str::slug($content->user->name_en).'/showInitiative/'.$content->id)}}">
                                                        <h6 class="m-0 font-weight-bold text-primary"> {{$content->title}}   </h6>
                                                    </a>
                                                </div>
                                                <div class="card-body p-0 pb-2">
                                                    <a href="{{url('enjaz/'.Str::slug($content->user->name_en).'/showInitiative/'.$content->id)}}">
                                                        <div class="initiative-img d-flex justify-content-center shadow-dark">
                                                            <img src="{{url($content->content_file->whereIN('extension',['jpeg','png','jpg','gif','svg','webp'])->first()->AttPath)}}" alt="" class="image-fluid">
                                                        </div>
                                                    </a>
                                                    <div class="initiative-footer  px-4 mt-2">
                                                        <div class="aricel-data-1 d-flex justify-content-between">
                                                            <div  class="publisher">
                                                                <i class="fas fa-user"></i>
                                                                <span>{{$content->user->name_ar}}</span>
                                                            </div>
                                                            <div class="">
                                                                <i class="fas fa-eye"></i> <span>{{$content->views}}</span>
                                                                <i class="fas fa-comment"></i> <span>4</span>
                                                                <i class="fas fa-heart"></i><span>{{$content->likes}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="aricel-data-1 d-flex justify-content-between">
                                                            <div  class="publisher"><i class="fas fa-book-open"></i><i class="fad fa-books"></i>
                                                                <span>{{$content->classification->name}}</span>
                                                            </div>
                                                            <div class="date">
                                                                <i class="fas fa-calendar-week"></i>
                                                                {{$content->created_at->format('Y/m/d')}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="procedures d-flex justify-content-between mt-3">
                                                            <div class="status align-middle">
                                                                <p id="status-tag{{$content->id}}" style="background-color: {{$content->status ==  __('enjaz.draft') ? "#ce3d4ee6":"#ffc107"}}">{{$content->status}}</p>
                                                            </div>
                                                            <div class="procedure d-flex justify-content-center">
                                                                <div class="toggle-flip ms-1">
                                                                    <label>
                                                                        <input class="user-article-status" type="checkbox" data-id="{{$content->id}}"
                                                                            {{ $content->status == __('enjaz.draft') ? 'checked' : '' }}>
                                                                        @if($content->status == __('enjaz.published'))
                                                                            <span class="flip-indecator" data-toggle-on="{{__('enjaz.publish')}}"
                                                                                  data-toggle-off="{{__('enjaz.unPublished')}}" style="font-size: small">
                                                                            </span>
                                                                        @else
                                                                            <span class="flip-indecator" data-toggle-on="{{__('enjaz.publish')}}"
                                                                                  data-toggle-off="{{__('enjaz.unPublished')}}" style="font-size: small">
                                                                            </span>
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                                <a href="" class="edit-btn" data-bs-toggle="modal" data-bs-target="#edit-initiative-eModal" data-bs-toggle="tooltip" data-id="{{$content->id}}" data-bs-html="true" title="{{__('enjaz.update')}}">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="{{route('initiatives.destroy',['id'=>$content->id,'folder'=>'initiatives'])}}" class="delete-btn delete-trashed" type="button">
                                                                    <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-html="true" title="{{__('enjaz.delete')}}"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category">
                                                    <span>{{__('enjaz.initiative')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $contents->links('dashboard.layouts.enjaz-layouts.pagination-links') !!}
                                @endif
                            </div>
                            <!-- articles data end -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.initiatives.create')
    @include('dashboard.enjaz.initiatives.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/initiative.js')}}"></script>
@endsection

