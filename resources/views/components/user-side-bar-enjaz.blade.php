<div class="card view-aside aside shadow-dark">
    <div class=" d-flex flex-column justify-content-center ">
        <img src="{{asset('enjaz/assent/imgs/avatar.png')}}" class="card-img-top bk-gry border-20 border-bottom mx-auto  border-4 "
             style="width: 100px;height: 100px;" alt="...">
        <div class="card-body mb-5">
            <div class="col-12 col-md-12 d-flex flex-column">
                <h4 class="my-auto color_home size-18 d-flex justify-content-center align-items-center ml-2" >
                    <span>{{$authUser->first_name_ar}} {{$authUser->second_name_ar}} {{$authUser->last_name_ar}}</span>
                    <a href="#"
                       class="me-2">
                        <span>
                          <i class="fa fa-share-nodes mx-auto" ></i>
                        </span>
                    </a>
                </h4>
                @if($experience)
                    @if($experience->job->name == 'معلم')
                        <p class="normal-text text-center">
                            {{$experience->user->teacher->school->name_ar}}
                            |
                            {{$experience->user->teacher->directorate->name_ar}}
                        </p>
                    @elseif($experience->job->name == 'مشرف تربوي')
                        <p class="normal-text text-center">
                            {{$experience->job->name}}
                            |
                            {{$experience->user->supervisor->directorate->name_ar}}
                        </p>
                    @else
                        <p class="normal-text text-center">
                            {{$experience->job->name}}
                            |
                            {{$experience->user->admin->directorate->name_ar}}
                        </p>
                    @endif
                @endif
                <div class="d-flex justify-content-center">
                    <button class="follow-btn rounded-pill">
                        <i class="fas fa-plus-circle"></i>
                        <span>متابعة</span>
                    </button>

                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button class="message-btn rounded-pill">
                        <i class="fas fa-envelope"></i>
                        <span>مراسلة</span>
                    </button>
                </div>
                <div class="statistics mt-2">
                    <div class="stat d-flex justify-content-between">
                        <p class="normal-text">
                            {{__('enjaz.views')}}
                        </p>
                        <p class="normal-text">
                            {{$authUser->profile_views}}
                        </p>
                    </div>
                    <div class="stat d-flex justify-content-between">
                        <p class="normal-text">
                            {{__('enjaz.initiatives')}}
                        </p>
                        <p class="normal-text">
                            {{$initiative_count}}
                        </p>
                    </div>
                    <div class="stat d-flex justify-content-between">
                        <p class="normal-text">
                            {{__('enjaz.articles')}}
                        </p>
                        <p class="normal-text">
                            {{$article_count}}
                        </p>
                    </div>
                    <div class="stat d-flex justify-content-between">
                        <p class="normal-text">
                            {{__('enjaz.achievements')}}
                        </p>
                        <p class="normal-text">
                            {{$achievement_count}}
                        </p>
                    </div>
                    <div class="stat d-flex justify-content-between">
                        <p class="normal-text">
                            متابعون
                        </p>
                        <p class="normal-text">
                            {{$followers}}
                        </p>
                    </div>
                    <div class="stat d-flex justify-content-between">
                        <p class="normal-text">
                            تعليقات
                        </p>
                        <p class="normal-text">
                            100
                        </p>
                    </div>
                </div>
                @if($social_accounts->count() > 0)
                    <div class="social-btns mt-3 text-center">
                        @foreach($social_accounts as $social_account)
                            <a href="{{$social_account->link}}" class=" message-btn rounded-pill d-flex justify-content-center align-items-center mt-1">
                                <i class="fab fa-facebook ms-1"></i>
                                <span>{{$social_account->social_platform->name}}</span>
                            </a>
                        @endforeach
                    </div>
                @endif
                <div class="bio mt-3">
                    <p class="normal-text">
                        @if($bio)
                            {{$bio->info}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
