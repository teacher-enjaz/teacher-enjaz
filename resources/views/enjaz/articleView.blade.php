@extends('enjaz.layout.viewLayout')

@section('title')
@endsection

@section('content')
    <div class="container main-content profile  my-5">
        <div class="row section-title">
            <h3 class="pe-0">{{$article->title}}
            </h3>

        </div>
        <div class="row">
            <div class="col-8">
                <div class="d-flex ">
                    <p class="article-date">
                        {{$article->created_at->format('Y/m/d')}}
                    </p>
                    @if($article->updated_at != '')
                        <p class="article-date mx-4">
                            آخر تعديل
                            {{$article->updated_at->format('Y/m/d')}}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 col-md-6 col-sm-12">
                <div class="article-img">
                    <img src="{{url($article->content_file->first()->AttPath)}}" alt="">
                </div>
                <div class="article-info d-flex justify-content-between mt-3  ">
                    <div class="article-publisher">
                        <i class="fas fa-user"></i>
                        {{$article->user->name_ar}}
                    </div>
                    <div class="statics-info card-text-a  ">
                        <i class="fas fa-eye ms-2"></i>{{$article->views}}
                        <i class="fas fa-comment ms-2"></i>{{$article->comment ? $article->comment->count() : 0}}
                        <i class="fas fa-heart ms-2"></i>{{$article->likes}}
                    </div>
                </div>
                <div class="article-text my-5">
                    {!! $article->article->details !!}
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
                            <i class="fas fa-eye ms-2"></i>{{$article->views}}
                            <i class="fas fa-comment ms-2"></i>{{$article->comment ? $article->comment->count() : 0}}
                            <i class="fas fa-heart ms-2"></i>{{$article->likes}}
                        </div>
                    </div>
                </div>
            </div>
            @if($articles->count() > 1)
            <div class="col-12 col-lg-4 col-md-6 col-sm-12 articles">
                <div class="last-articles">
                    <h5>  آخر المقالات</h5>
                </div>
                @foreach($articles as $one_article)
                <div class="mt-2">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                {{$one_article->title}}
                            </div>
                            <img src="{{url($one_article->content_file->first()->AttPath)}}" class="card-img-top" alt="...">
                            <div class="card-body">

                                <p class="card-text">
                                <div class="info-1 d-flex justify-content-between">
                                    <div class="user-name card-text-a">
                                        <i class="fas fa-user"></i>
                                        {{$one_article->user->name_ar}}
                                    </div>
                                    <div class="statics-info card-text-a">
                                        <i class="fas fa-eye ms-2"></i>{{$one_article->views}}
                                        <i class="fas fa-comment ms-2"></i>{{$one_article->comment ? $article->comment->count() : 0}}
                                        <i class="fas fa-heart ms-2"></i>{{$one_article->likes}}
                                    </div>
                                </div>
                                <div class="info-2 d-flex justify-content-between">
                                    <div class="user-name card-text-a">
                                        <i class="fas fa-book-open"></i>
                                        {{$one_article->classification->name}}
                                    </div>
                                    <div class="statics-info card-text-a">
                                        <i class="fas fa-calendar-week ms-2"></i>
                                        {{$article->created_at->format('Y/m/d')}}
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
