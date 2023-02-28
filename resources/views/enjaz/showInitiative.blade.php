@extends('enjaz.layout.layout')

@section('title')
@endsection

@section('content')
    <div class="row section-title mb-5">
        <h3 >            مبادرة المحافظة على الهوية العربية
        </h3>
        <p class="initiv-date">من 12-3-2019 إلى 12-5-2019</p>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="d-flex justify-content-start">
                <img src="assent/imgs/avatar.png" class="card-img-top bk-gry border-20 border-bottom mx-2 ms-5 border-4 "
                     style="width: 100px;height: 100px;" alt="...">
                <div class="user-about">
                    <h4 class="my-auto color_home size-18 d-flex justify-content-center align-items-center ml-2" >
                        <span>خالد محمد فارس  </span>
                        <a href="#"lass="me-2">
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
                            <span>متابعة</span>
                        </button>
                        <button class="message-btn-2 rounded-pill">
                            <i class="fas fa-envelope"></i>
                            <span>مراسلة</span>
                        </button>
                    </div>




                </div>
            </div>
            <div class="about-initiv my-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="target">
                            الفئة المستهدفة:
                            <p>طلاب المدرسة من جميع المراحل</p>
                        </div>
                        <div class="topic">
                            مجال المبادرة:
                            <p>   تعليمية </p>

                        </div>
                    </div>
                    <div class="team">
                        فريق المبادرة:
                        <p>  أعضاء نادي اللغة العربية في المدرسة  </p>
                        <p>  أعضاء نادي اللغة العربية في المدرسة  </p>
                        <p>  أعضاء نادي اللغة العربية في المدرسة  </p>
                        <p>  أعضاء نادي اللغة العربية في المدرسة  </p>
                    </div>
                </div>

                <div class="description">
                    وصف المبادرة:
                    <p>
                        وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة
                        وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة
                        وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة
                        وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة
                        وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة
                        وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة وصف المبادرة

                    </p>

                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between statics-initiv">
                    <!-- <div class="add-like">
                        <i class="far fa-heart ms-1"></i>أعجبني
                    </div> -->



                    <div class="wrapper">

                        <a class="purple-head hover-black" onclick="changeIcon(this)" id="myBtn">
                            <i class="more far fa-heart font-xs"></i>
                            <span class="more"> أعجبني</span>
                            <i class="less fas fa-heart font-xs"></i>
                            <span class="less"> إلغاء الإعجاب</span>
                        </a>
                    </div>





                    <div class="">
                        <i class="fas fa-eye"></i> <span>33</span>
                        <i class="fas fa-comment"></i> <span>4</span>
                        <i class="fas fa-heart"></i><span>19</span>
                    </div>
                    <div  class="publisher"><i class="fas fa-book-open"></i><i class="fad fa-books"></i>
                        <span>اللغة العربية - الأدب   </span>
                    </div>
                    <div class="date">
                        <i class="fas fa-calendar-week"></i>
                        20/3/2021
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

        <div class="col-12 col-lg-6">
            <div class="row">


                <div class="col-8 d-flex align-items-center">
                        <span onclick=
                              "this.parentElement.style.display='none'">
                        </span>

                    <img id="expand" class=" img-initiv"
                         style="width:100%;
                            height: 100%;" src="assent/imgs/130822746_101319495191344_4042666308977379482_n.png">
                </div>
                <div class="col-3 column">
                    <img src="assent/imgs/130822746_101319495191344_4042666308977379482_n.png"
                         style="width: 100%;"  onclick="gfg(this);" class="img-initiv">
                    <img src= "assent/imgs/arabic-articale.PNG"
                         style="width: 100%;" onclick="gfg(this);" class="img-initiv">
                    <img src= "assent/imgs/business-presentation.png"
                         style="width: 100%;" onclick="gfg(this);" class="img-initiv">
                </div>
            </div>
            <div class="row mt-3">
                <div class="attachments">
                    <h2>
                        المرفقات
                    </h2>
                    <div class="mt-3">
                        <a href="C:\Users\MSI GF\Downloads\عربي علمي معدل.pdf" target="_blank">أجندة المبادرة</a>
                        <a href="C:\Users\MSI GF\Downloads\عربي علمي معدل.pdf" target="_blank">أجندة المبادرة</a>
                        <a href="C:\Users\MSI GF\Downloads\عربي علمي معدل.pdf" target="_blank">أجندة المبادرة</a>
                    </div>
                </div>

            </div>
            <div class="row mt-3">
                <div class="attachments">
                    <h2>
                        روابط خارجية
                    </h2>
                    <div class="mt-3">
                        <a href="C:\Users\MSI GF\Downloads\عربي علمي معدل.pdf" target="_blank">فيديو 1 </a>
                        <a href="C:\Users\MSI GF\Downloads\عربي علمي معدل.pdf" target="_blank">مشاركات الطلاب </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
