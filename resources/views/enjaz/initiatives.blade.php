<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.initiatives')}}</h1>
</div>
@if($contents->count() > 0)
    <div class="articles mt-4">
        <div class="container">
            <div class="row">
                @foreach($contents as $content)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{--{{route('enjaz.showInitiative',$content->id)}}--}}">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    {{$content->title}}
                                </div>
                                <img src="{{url($content->content_file->whereIN('extension',['jpeg','png','jpg','gif','svg','webp'])->first()->AttPath)}}" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="info-1 d-flex justify-content-between">
                                        <div class="user-name card-text-a">
                                            <i class="fas fa-user"></i>
                                            {{$content->user->name_ar}}
                                        </div>
                                        <div class="statics-info card-text-a">
                                            <i class="fas fa-eye ms-2"></i>{{$content->views}}
                                            <i class="fas fa-comment ms-2"></i>10
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
                                            {{$content->initiative->end_date}}
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
