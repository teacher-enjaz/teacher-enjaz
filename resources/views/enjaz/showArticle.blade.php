@extends('enjaz.layout.viewLayout')

@section('title')
@endsection

@section('content')
    <div class="container main-content profile  my-5">
        <div class="row article-cat">
            <p>            مقالة
                |
                {{$content->classification->name}}
            </p>
        </div>
        <div class="row section-title">
            <h3 class="mr-2">{{$content->title}}</h3>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="d-flex ">
                    <p class="article-date">
                        {{$content->created_at->format('Y/m/d')}}
                    </p>
                    @if($content->updated_at != '')
                        <p class="article-date mx-4">
                            {{$content->updated_at->format('Y/m/d')}}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 col-md-6 col-sm-12">
                <div class="article-img">
                    <img src="{{url($content->content_file->first()->AttPath)}}" alt="">
                </div>

                <div class="article-info d-flex justify-content-between mt-3  ">
                    <div class="article-publisher">
                        <i class="fas fa-user"></i>
                        {{$content->user->name_ar}}
                    </div>
                    <div class="statics-info card-text-a  ">
                        <i class="fas fa-eye ms-2"></i>{{$content->views}}
                        <i class="fas fa-comment ms-2"></i>{{$content->comment ? $content->comment->count() : 0}}
                        <i class="fas fa-heart ms-2"></i>{{$content->likes}}
                    </div>
                </div>
                <div class="article-text my-5">
                    {!! $content->article->details !!}
                </div>
                <div class="row ">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="wrapper">
                            <a class="purple-head hover-black" onclick="changeIcon(this)" id="myBtn">
                                <i class="more far fa-heart font-xs"></i>
                                <span class="more"> أعجبني</span>
                                <i class="less fas fa-heart font-xs"></i>
                                <span class="less"> إلغاء الإعجاب</span>
                            </a>
                        </div>
                        <div class="statics-info card-text-a  ">
                            <i class="fas fa-eye ms-2"></i>{{$content->views}}
                            <i class="fas fa-comment ms-2"></i>{{$content->comment ? $content->comment->count() : 0}}
                            <i class="fas fa-heart ms-2"></i>{{$content->likes}}
                        </div>
                    </div>
                </div>
                {{--<div class="comments-section  my-4">
                    <div class="row">

                    </div>
                    <div class="row border-bottom mb-2">
                        <div class="col-2 comment-time ">
                            <p class="mb-0">محمد أحمد</p>
                            <p>02:23
                                |
                                2020-2-3</p>


                        </div>
                        <div class="col-10 d-flex justify-content-between">
                            <p class="comment">نص التعليق نص  التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق</p>


                            <div class="dropup">
                                <button class="dropbtn" onclick="actionsDrop()"> <i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropup-content" id="dropup-content">
                                    <a href="#"> تعديل</a>
                                    <a href="#"> حذف</a>
                                </div>
                            </div>






                        </div>

                    </div>
                    <div class="row border-bottom mb-2">
                        <div class="col-2 comment-time ">
                            <p class="mb-0">محمد أحمد</p>
                            <p>02:23
                                |
                                2020-2-3</p>


                        </div>
                        <div class="col-10 d-flex justify-content-between">
                            <p class="comment">نص التعليق نص  التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق</p>


                            <div class="dropup">
                                <button class="dropbtn" onclick="actionsDrop()"> <i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropup-content" id="dropup-content">
                                    <a href="#"> تعديل</a>
                                    <a href="#"> حذف</a>
                                </div>
                            </div>






                        </div>

                    </div>
                    <div class="row border-bottom mb-2">
                        <div class="col-2 comment-time ">
                            <p class="mb-0">محمد أحمد</p>
                            <p>02:23
                                |
                                2020-2-3</p>


                        </div>
                        <div class="col-10 d-flex justify-content-between">
                            <p class="comment">نص التعليق نص  التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق</p>


                            <div class="dropup">
                                <button class="dropbtn" onclick="actionsDrop()"> <i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropup-content" id="dropup-content">
                                    <a href="#"> تعديل</a>
                                    <a href="#"> حذف</a>
                                </div>
                            </div>






                        </div>

                    </div>
                    <div class="row border-bottom mb-2">
                        <div class="col-2 comment-time ">
                            <p class="mb-0">محمد أحمد</p>
                            <p>02:23
                                |
                                2020-2-3</p>


                        </div>
                        <div class="col-10 d-flex justify-content-between">
                            <p class="comment">نص التعليق نص  التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق التعليق</p>


                            <div class="dropup">
                                <button class="dropbtn" onclick="actionsDrop()"> <i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropup-content" id="dropup-content">
                                    <a href="#"> تعديل</a>
                                    <a href="#"> حذف</a>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <form class="col-12 my-2   justify-content-center d-flex  p-1 comment-input">
                            <input class="form-control me-2 border-0 border-left rounded-pill  size-11 " type="search" placeholder=" اكتب تعليقاً... " aria-label="Search">
                            <a href="#" class="text-center " type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </a>
                        </form>
                    </div>
                </div>--}}
            </div>
            @if($contents->count() > 1)
                <div class="col-12 col-lg-4 col-md-6 col-sm-12 articles">
                    <div class="last-articles">
                        <h5>{{__('enjaz.lastArticles')}}</h5>
                    </div>
                    @foreach($contents as $content)
                        <div class="mt-2">
                            <a href="{{route('enjaz.showArticle',['name_en'=>\Illuminate\Support\Str::slug($content->user->name_en),'id'=>$content->id])}}">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-header">
                                        {{$content->title}}
                                    </div>
                                    <img src="{{url($content->content_file->first()->AttPath)}}" class="card-img-top" alt="...">
                                    <div class="card-body">

                                        <p class="card-text">
                                        <div class="info-1 d-flex justify-content-between">
                                            <div class="user-name card-text-a">
                                                <i class="fas fa-user"></i>
                                                {{$content->user->name_ar}}
                                            </div>
                                            <div class="statics-info card-text-a">
                                                <i class="fas fa-eye ms-2"></i>{{$content->views}}
                                                <i class="fas fa-comment ms-2"></i>{{$content->comment ? $article->comment->count() : 0}}
                                                <i class="fas fa-heart ms-2"></i>{{$content->likes}}
                                            </div>
                                        </div>
                                        <div class="info-2 d-flex justify-content-between">
                                            <div class="user-name card-text-a">
                                                <i class="fas fa-book-open"></i>
                                                {{$content->classification->name}}
                                            </div>
                                            <div class="statics-info card-text-a">
                                                <i class="fas fa-calendar-week ms-2"></i>
                                                {{$content->created_at->format('Y/m/d')}}
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
