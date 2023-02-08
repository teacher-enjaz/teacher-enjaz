{{--sidebar--}}
<div class="aside">
    <div class=" d-flex flex-column justify-content-center">
        <img src="{{asset('assent/imgs/avatar.png')}}"
             class="card-img-top bk-gry border-20 border-bottom mx-auto  border-4 "
             style="width: 100px;height: 100px;" alt="...">
        <div class="card-body mb-5">
            <div class="col-12 col-md-12 d-flex flex-column">
                <h4 class="my-auto color_home size-18 d-flex justify-content-center align-items-center ml-2">
                    <span>خالد محمد فارس  </span>
                    <a href="#" class="me-2">
                        <span>
                          <i class="fa fa-share-nodes mx-auto"></i>
                        </span>
                    </a>
                </h4>
                <div class="col-12 col-md-12 d-flex flex-row justify-content-evenly my-2">
                    <a href="#" class="mr-2 view-as">
                        <span href="#" class="" data-bs-toggle="tooltip" data-bs-html="true"
                              title="https://rawafed.edu.ps/ar/khaled-fares">

                          <i class="fa fa-eye mx-auto"></i>
                          عرض  ملف الإنجاز
                        </span>
                    </a>
                </div>
            </div>
            <ul class="ul-aside d-flex flex-column justify-content-center mb-5 pb-3">
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start ">
                        <a href="cpanel.html" class="d-flex align-content-start title-cpanel p-1 pe-3 active">
                            <span>
                              <i class="fa fa-user mx-auto"></i>
                                 <span class="text-a">البيانات الشخصية</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="qualifications.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-book mx-auto"></i>
                              <span class="text-a">المؤهلات العلمية</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="{{route('experiences.index')}}" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-book-open-reader mx-auto"></i>
                                <span class="text-a">{{__('enjaz.experiences')}}</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="{{route('memberships.index')}}" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-address-card mx-auto"></i>
                                <span class="text-a">{{__('enjaz.memberships')}}</span>
                            </span>
                        </a>
                    </div>
                </li>
                {{--<li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="courses.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-cube mx-auto"></i>
                                <span class="text-a">الدورات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="skills.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-computer-mouse mx-auto"></i>
                                <span class="text-a">المهارات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="user-languages.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-language mx-auto"></i>
                                <span class="text-a">اللغات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="memberships.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-address-card mx-auto"></i>
                                <span class="text-a">العضويات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="socialMedia.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-link mx-auto"></i>
                              <span class="text-a">مواقع التواصل الاجتماعي</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="classifications.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-newspaper mx-auto"></i>
                                <span class="text-a">التصنيفات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="articles.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-newspaper mx-auto"></i>
                                <span class="text-a">المقالات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="initiatives.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-feather mx-auto"></i>
                                <span class="text-a">المبادرات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="achievements.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-sun mx-auto"></i>
                                <span class="text-a">الإنجازات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="awards.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                              <i class="fa fa-award mx-auto"></i>
                               <span class="text-a"> الجوائز والمسابقات</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="comments.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>

                              <i class="fas fa-comment mx-auto"></i>
                               <span class="text-a"> التعليقات </span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="col-12 col-md-12 mb-2 justify-content-center">
                    <div class="dropdown d-flex justify-content-start">
                        <a href="messages.html" class="d-flex align-content-start title-cpanel p-1 pe-3">
                            <span>
                                <i class="fas fa-envelope mx-auto"></i>
                               <span class="text-a"> الرسائل الواردة </span>
                            </span>
                        </a>
                    </div>
                </li>--}}
            </ul>
        </div>
    </div>
</div>
