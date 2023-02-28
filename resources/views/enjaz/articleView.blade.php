@extends('enjaz.layout.layout')

@section('title')
@endsection

@section('content')

<div class="container main-content profile  my-5">
    {{--<div class="row article-cat">
        <p>            مقالة
            |
            أدب و بلاغة
        </p>
    </div>--}}
    <div class="row section-title">
        <h3 class="pe-0">{{$article->title}}
        </h3>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="d-flex ">
                <p class="article-date">
                    20-3-2022
                </p>
                <p class="article-date mx-4">
                    آخر تعديل
                    20-3-2022
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 col-md-6 col-sm-12">
            <div class="article-img">
                <img src="assent/imgs/arabic-articale.PNG" alt="">
            </div>

            <div class="article-info d-flex justify-content-between mt-3  ">
                <div class="article-publisher">
                    <i class="fas fa-user"></i>
                    خالد محمد فارس
                </div>
                <div class="statics-info card-text-a  ">
                    <i class="fas fa-eye ms-2"></i>23
                    <i class="fas fa-comment ms-2"></i>10
                    <i class="fas fa-heart ms-2"></i>15
                </div>
            </div>
            <div class="article-text my-5">
                <p>نص المقالة نص المقالة نص المقالة نص المقالةنص المقالةنص المقالةنص المقالةنص المقالةنص المقالة
                    نص المقالةنص المقالةنص المقالة نص المقالةنص المقالة نص المقالة نص المقالةنص المقالة نص المقالةنص
                    نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة
                </p>
                <br>
                <br>
                <p>نص المقالة نص المقالة نص المقالة نص المقالةنص المقالةنص المقالةنص المقالةنص المقالةنص المقالة
                    نص المقالةنص المقالةنص المقالة نص المقالةنص المقالة نص المقالة نص المقالةنص المقالة نص المقالةنص
                    نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة
                </p>
                <p>نص المقالة نص المقالة نص المقالة نص المقالةنص المقالةنص المقالةنص المقالةنص المقالةنص المقالة
                    نص المقالةنص المقالةنص المقالة نص المقالةنص المقالة نص المقالة نص المقالةنص المقالة نص المقالةنص
                    نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة
                </p>
                <br><br>
                <p>نص المقالة نص المقالة نص المقالة نص المقالةنص المقالةنص المقالةنص المقالةنص المقالةنص المقالة
                    نص المقالةنص المقالةنص المقالة نص المقالةنص المقالة نص المقالة نص المقالةنص المقالة نص المقالةنص
                    نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة
                </p>
                <br>
                <p>نص المقالة نص المقالة نص المقالة نص المقالةنص المقالةنص المقالةنص المقالةنص المقالةنص المقالة
                    نص المقالةنص المقالةنص المقالة نص المقالةنص المقالة نص المقالة نص المقالةنص المقالة نص المقالةنص
                    نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة نص المقالة
                </p>
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
                        <i class="fas fa-eye ms-2"></i>23
                        <i class="fas fa-comment ms-2"></i>10
                        <i class="fas fa-heart ms-2"></i>15
                    </div>
                </div>
            </div>
            <div class="comments-section  my-4">
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
            </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 col-sm-12 articles">
            <div class="last-articles">
                <h5>  آخر المقالات</h5>
            </div>
            <div class="mt-2">
                <a href="#">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            اللغة العربية و التواصل الحضاري
                        </div>
                        <img src="assent/imgs/arabic-articale.PNG" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">
                            <div class="info-1 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-user"></i>
                                    خالد محمد فارس
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-eye ms-2"></i>23
                                    <i class="fas fa-comment ms-2"></i>10
                                    <i class="fas fa-heart ms-2"></i>15
                                </div>
                            </div>
                            <div class="info-2 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-book-open"></i>
                                    أدب
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-calendar-week ms-2"></i>
                                    20-3-2022


                                </div>
                            </div>
                            </p>


                        </div>
                    </div>
                </a>
            </div>
            <div class="mt-2">
                <a href="#">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            اللغة العربية و التواصل الحضاري
                        </div>
                        <img src="assent/imgs/arabic-articale.PNG" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">
                            <div class="info-1 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-user"></i>
                                    خالد محمد فارس
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-eye ms-2"></i>23
                                    <i class="fas fa-comment ms-2"></i>10
                                    <i class="fas fa-heart ms-2"></i>15
                                </div>
                            </div>
                            <div class="info-2 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-book-open"></i>
                                    أدب
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-calendar-week ms-2"></i>
                                    20-3-2022


                                </div>
                            </div>
                            </p>


                        </div>
                    </div>
                </a>
            </div>
            <div class="mt-2">
                <a href="#">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            اللغة العربية و التواصل الحضاري
                        </div>
                        <img src="assent/imgs/arabic-articale.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">
                            <div class="info-1 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-user"></i>
                                    خالد محمد فارس
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-eye ms-2"></i>23
                                    <i class="fas fa-comment ms-2"></i>10
                                    <i class="fas fa-heart ms-2"></i>15
                                </div>
                            </div>
                            <div class="info-2 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-book-open"></i>
                                    أدب
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-calendar-week ms-2"></i>
                                    20-3-2022
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="mt-2">
                <a href="#">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            اللغة العربية و التواصل الحضاري
                        </div>
                        <img src="assent/imgs/arabic-articale.PNG" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">
                            <div class="info-1 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-user"></i>
                                    خالد محمد فارس
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-eye ms-2"></i>23
                                    <i class="fas fa-comment ms-2"></i>10
                                    <i class="fas fa-heart ms-2"></i>15
                                </div>
                            </div>
                            <div class="info-2 d-flex justify-content-between">
                                <div class="user-name card-text-a">
                                    <i class="fas fa-book-open"></i>
                                    أدب
                                </div>
                                <div class="statics-info card-text-a">
                                    <i class="fas fa-calendar-week ms-2"></i>
                                    20-3-2022
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
