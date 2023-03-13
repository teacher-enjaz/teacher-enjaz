@extends('enjaz.layout.viewLayout')

@section('title')
@endsection

@section('content')
    @if($award)
    <div class="container main-content profile  my-5">
        <div class="row section-title mb-5">
            <h3>{{$award->award->name}}</h3>
            <p class="initiv-date">{{$award->obtained_date}}</p>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <img id="expand" class=" img-initiv"
                         style="width:70%;
                                height: 100%;" src="{{url('storage/awards/'.$award->image)}}">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="about-initiv mb-5 mt-5 mt-lg-0">

                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="target">
                                {{__('enjaz.awardUser')}} :
                                <p>{{$award->user->name_ar}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="target">
                                {{__('enjaz.awardDonor')}} :
                                <p>{{$award->award->donor }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        {{__('enjaz.awardDescription')}}:
                        <p>
                            {{$award->award->description }}
                        </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="attachments">
                        <h2>
                            {{__('enjaz.youtubeLink')}}
                        </h2>
                        <div class="mt-3">
{{--                            <a href="C:\Users\MSI GF\Downloads\عربي علمي معدل.pdf" target="_blank">فيديو 1 </a>--}}
                            <div>
                                <iframe class="embed-responsive-item mx-auto"
                                        style="border-radius: 10px;border: 2px solid #f9f2f2;box-shadow: 0 8px 16px rgba(94,82,246,.25)"
                                        src="https://www.youtube.com/embed/{{getYoutubeID($award->youtube_link)}}"
                                        id="video-frame"
                                        allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->
    @endif
@endsection
