@extends('dashboard.layouts.enjaz-layouts.layout')
@section('content')
    <div class="container file_view mt-5 profile cpanel">
        <div class="d-flex flex-column video-show mt-3 order-0 card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-9 d-flex flex-column justify-content-sm-center justify-content-md-center text-center"
                     style="background-color: #109f99;
                     color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: -36px;">
                    <h4 class="my-auto text-white size-18 py-2" >لوحة تحكم ملف الإنجاز</h4>
                </div>
            </div>
        </div>
        <div class="d-flex">
            @include('dashboard.layouts.enjaz-sidebar')
            <div class="main-content" style="width: 90%;">
                <div class=" d-flex justify-content-center">
                    <div class="container-fluid ">
                        <!-- personal data  -->
                        <section class="row section width-80" style="display: block;">
                            <!-- Page Heading -->
                            <div class="section-title d-sm-flex align-items-center justify-content-between mb-4 ">
                                <h1 class="h3 mb-0 text-gray-800">البيانات الشخصية</h1>
                            </div>
                            <div class="row">
                                <div class="about-text padd-15">
                                    <h3>
                                            <span>
                                                مدرس لغة عربية
                                                <span class="slash">/</span>
                                                مدرسة خالد الحسن الثانوية
                                                <span class="slash">/</span>
                                                مديرية خان يونس
                                            </span>
                                    </h3>
                                    <div class="bio mt-3">
                                        <div class="d-flex">
                                            <h4>نبذة</h4>
                                            <a href="" class="me-2 mt-1" data-bs-toggle="modal" data-bs-target="#edit-bio-eModal">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                        <p>
                                            خبرة عشر سنوات ,خلال هذه السنوات قمت بتدريس اللغة العربية للمراحل التعليمية الثلاثة الابتدائي و الاعداداي ........ بخبرة عشر سنوات ,خلال هذه السنوات قمت بتدريس اللغة العربية للمراحل التعليمية الثلاثة الابتدائي و الاعداداي ........ بخبرة عشر سنوات ,خلال هذه السنوات قمت بتدريس اللغة العربية للمراحل التعليمية الثلاثة الابتدائي و الاعداداي
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="personal-info padd-15">
                                        <div class="row">
                                            <div class="info-item padd-15">
                                                <p> رقم الهوية : <span>3362826</span></p>
                                            </div>
                                            <div class="info-item padd-15">
                                                <p>  العمر : <span>46</span></p>
                                            </div>
                                            <div class="info-item padd-15">
                                                <p>  التخصص الجامعي : <span>اللغة العربية و أساليب تدريسها</span></p>
                                            </div>
                                            <div class="info-item padd-15">
                                                <p>  الدرجة : <span>البكالوريس</span></p>
                                            </div>
                                            <div class="info-item padd-15">
                                                <p>  الجامعة  : <span> جامعة الأقصى</span></p>
                                            </div>
                                            <div class="info-item padd-15">
                                                <p>  البريد الالكتروني  : <span> mohammed23@gmail.com </span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد مشاهدات الملف</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fas fa-eye"></i>
                                                <p>
                                                    40
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد المقالات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fa fa-newspaper"></i>
                                                <p>
                                                    4
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد المبادرات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fa fa-feather"></i>
                                                <p>
                                                    6
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد الإنجازات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fa fa-sun"></i>
                                                <p>
                                                    10
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد  الإعجابات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fas fa-thumbs-up"></i>
                                                <p>
                                                    33
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" style="padding-right: 0px;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">عدد التعليقات</h6>
                                        </div>
                                        <div class="card-body px-4 ">
                                            <div class="static d-flex justify-content-between align-items-center">
                                                <i class="fas fa-comment"></i>
                                                <p>
                                                    29
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row" style="margin-bottom: 3rem">
                                <div class="buttons  d-flex justify-content-center">
                                    <a href="#" class="custom-btn ms-1"><i class="fas fa-download"></i> السيرة الذاتية</a>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit bio modal -->
    {{--<div class="modal fade bio-eModal" id="edit-bio-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabelBIO">تعديل النبذة الشخصية     </h5>
                    <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-hint">
                    <p> لخص ما يميزك في كلمات موجزة</p>
                </div>
                <div class="modal-body p-3 m-5 mt-0" >
                    <div class="form-floating mb-3 ms-3">
                        <textarea  class="form-control" id="floatingInputBIO" rows="4">
                            خبرة عشر سنوات ,خلال هذه السنوات قمت بتدريس اللغة العربية للمراحل التعليمية الثلاثة الابتدائي و الاعداداي ........ بخبرة عشر سنوات ,خلال هذه السنوات قمت بتدريس اللغة العربية للمراحل التعليمية الثلاثة الابتدائي و الاعداداي ........ بخبرة عشر سنوات ,خلال هذه السنوات قمت بتدريس اللغة العربية للمراحل التعليمية الثلاثة الابتدائي و الاعداداي
                        </textarea>
                        <label for="floatingInput" > النبذة   </label>
                    </div>
                    <button type="button" class="btn custom-btn"> حفظ</button>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
