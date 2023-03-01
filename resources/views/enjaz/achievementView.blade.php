@extends('enjaz.layout.viewLayout')

@section('title')
@endsection

@section('content')
<div class="container main-content profile  my-5">
    <div class="row section-title mb-5">
        <h3>{{$achievement->title}}</h3>
        <p class="initiv-date">{{__('enjaz.from')}} {{$achievement->achievement->start_date}} {{__('enjaz.to')}} {{$achievement->achievement->end_date}}</p>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="d-flex justify-content-start">
                <img src="{{asset('enjaz/assent/imgs/avatar.png')}}" class="card-img-top bk-gry border-20 border-bottom mx-2 ms-5 border-4 "
                     style="width: 100px;height: 100px;" alt="...">
                <div class="user-about">
                    <h4 class="my-auto color_home size-18 d-flex justify-content-start align-items-center" >
                        <span class="mx-2">{{$achievement->user->name_ar}}</span>
                        <a href="#"lass="mx-2">
                            <span>
                                <i class="fa fa-share-nodes mx-auto" ></i>
                            </span>
                        </a>
                    </h4>
                    <p class="normal-text">
                        مدرسة خالد الحسن الثانوية
                        |
                        مديرية خان يونس
                    </p>
                    <div class="d-flex justify-content-between">
                        <button class="follow-btn-2 rounded-pill">
                            <i class="fas fa-plus-circle"></i>
                            <span>{{__('enjaz.follow')}}</span>
                        </button>
                        <button class="message-btn-2 rounded-pill">
                            <i class="fas fa-envelope"></i>
                            <span>{{__('enjaz.sendMail')}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="about-initiv my-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="topic">
                            {{__('enjaz.achievementType')}}
                            <p> {{$achievement->classification->name}} </p>
                        </div>
                    </div>
                </div>
                <div class="description">
                    {{__('enjaz.achievementDescription')}}
                    <p>
                      {{$achievement->achievement->description}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-between statics-initiv">
                    <div class="wrapper">
                        <a class="purple-head hover-black" onclick="changeIcon(this)" id="myBtn">
                            <i class="more far fa-heart font-xs"></i>
                            <span class="more"> أعجبني</span>
                            <i class="less fas fa-heart font-xs"></i>
                            <span class="less"> إلغاء الإعجاب</span>
                        </a>
                    </div>
                    <div class="">
                        <i class="fas fa-eye"></i> <span>{{$achievement->views}}</span>
                        <i class="fas fa-comment"></i> <span>4</span>
                        <i class="fas fa-heart"></i><span>{{$achievement->likes}}</span>
                    </div>
                    <div class="date">
                        <i class="fas fa-calendar-week"></i>
                        {{$achievement->created_at->format('Y/m/d')}}
                    </div>
                </div>
            </div>
            <div class="comments-section  my-4">
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
            </div>
        </div>
        <div class="col-12 col-lg-5 attachments">
            <div class="row ">
                <h2>
                    {{__('enjaz.images')}}
                </h2>
            </div>
            <div class="row">
                <div class="col-8 align-items-center">
                    <img id="expand" class="img-initiv" style="width:100%;height: 200px;object-fit: contain" src="{{url($achievement->content_file->whereIN('extension',['jpeg','png','jpg','gif','svg','webp'])->first()->AttPath)}}">
                </div>
                <div class="col-3 column navbar-nav-scroll" style="height: 200px">
                    @foreach($achievement->content_file->whereIN('extension',['jpeg','png','jpg','gif','svg','webp']) as $file)
                        <img src="{{url($file->AttPath)}}" style="width: 100%;"  onclick="showImage({{$file->id}})" data-image="{{url($file->AttPath)}}" class="img-initiv test" id="image{{$file->id}}"/>
                    @endforeach
                </div>
            </div>
            <div class="row mt-5 attachments">
                <div class="col-12">
                    <h2>
                        {{__('enjaz.videoLink')}}
                    </h2>
                </div>
                <div class="col-8 align-items-center">
                    <iframe class="embed-responsive-item mx-auto"
                             style="border-radius: 10px;border: 2px solid #f9f2f2;box-shadow: 0 8px 16px rgba(94,82,246,.25);width:100%;height: 200px;object-fit: contain"
                             src="https://www.youtube.com/embed/{{getYoutubeID($achievement->content_file->whereNull('extension')->first()->name)}}"
                             id="video-frame"
                             allowfullscreen>
                    </iframe>
                </div>
                <div class="col-4 column navbar-nav-scroll" style="height: 200px;">
                    @foreach($achievement->content_file->whereNull('extension') as $file)
                        <img src="https://img.youtube.com/vi/{{getYoutubeID($file->name)}}/mqdefault.jpg"
                             style="width: 100%;"  onclick="showVideo({{$file->id}})" data-video="{{getYoutubeID($file->name)}}" class="img-initiv" id="video{{$file->id}}"/>
                    @endforeach
                </div>
            </div>
            <div class="row mt-5">
                <div class="attachments">
                    <h2>
                        {{__('enjaz.attachments')}}
                    </h2>
                    <div class="mt-3">
                        @foreach($achievement->content_file->whereIN('extension',['pdf','doc','xdoc','ppt','xppt','xsl','docx','.xlsx']) as $file)
                            <a href="{{url($file->AttPath)}}" target="_blank">{{$achievement->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function showImage(id) {
            let path = $('#image'+id).data('image')
            console.log(path)
            document.getElementById('expand').src = `${path}`
        }
        function showVideo(id) {
            let video_id = $('#video'+id).data('video')
            console.log(video_id)
            document.getElementById('video-frame').src = `https://www.youtube.com/embed/${video_id}`
        }
    </script>
@endsection
