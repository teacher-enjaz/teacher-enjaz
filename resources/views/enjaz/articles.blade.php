
<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.articles')}} </h1>
</div>
@if($articles->count() > 0)
    <div class="articles mt-4">
        <div class="container">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{route('index.details.article',['name_en'=>$article->user->name_en,'id'=>$article->id])}}">
{{--                        <a href="{{url($article->user->name_en.'/getDetailsArticles/' . $article->id) }}">--}}
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    {{$article->title}}
                                </div>
                                <img src="{{url($article->content_file->first()->AttPath)}}" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <p class="card-text">
                                    <div class="info-1 d-flex justify-content-between">
                                        <div class="user-name card-text-a">
                                            <i class="fas fa-user"></i>
                                            {{$article->user->name_ar}}
                                        </div>
                                        <div class="statics-info card-text-a">
                                            <i class="fas fa-eye ms-2"></i>{{$article->views}}
                                            <i class="fas fa-comment ms-2"></i>{{$article->comment ? $article->comment->count() : 0}}
                                            <i class="fas fa-heart ms-2"></i>{{$article->likes}}
                                        </div>
                                    </div>
                                    <div class="info-2 d-flex justify-content-between">
                                        <div class="user-name card-text-a">
                                            <i class="fas fa-book-open"></i>
                                            {{$article->classification->name}}
                                        </div>
                                        <div class="statics-info card-text-a">
                                            <i class="fas fa-calendar-week ms-2"></i>
                                            {{ date('d-m-Y', strtotime($article->created_at))}}
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
