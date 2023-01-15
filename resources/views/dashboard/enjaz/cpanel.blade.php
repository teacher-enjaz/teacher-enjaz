<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بوابة روافد التعليمية</title>
    <link href="{{asset('assent/styles/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assent/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" href="assent/styles/font-awesome.min.css">-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <link rel="stylesheet" href="assent/styles/sb-admin-2.css"> -->
    <link rel="stylesheet" href="{{asset('assent/styles/css/styles.css')}}" id="styles"/>
    <link rel="stylesheet" href="{{asset('assent/styles/css/styles2.css')}}" id="style"/>
    <link rel="stylesheet" href="{{asset('assent/js/jquery1.dataTables.min.css')}}">
    <style>
        body{
            background-image: url(../assent/imgs/bk-login.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .dropdown-item-main1 {
            display: block;
            width: 100%;
            padding: .25rem 1rem;
            clear: both;
            font-weight: 400;
            color:#0a0302;
            text-align: right;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            position: relative;
        }
        .dropdown-menu1{
            right: 70px;
            width: fit-content;
            background-color: #ffc107;
            border-radius: 10px;
            color: #0a0302;
        }
        .dropdown-toggle1::after {
            position: relative;
            right: 5px;
            margin-top: 5px;
        }
        .text-size{
            font-size: 12px;
        }
        .dropdown-item-main1:before{
            position: absolute;
            content: "";
            height: 100%;
            width: 3px;
            background-color: #0b6f6b;
            right: 0;
            top:0;
            display: none;
        }
        .dropdown-item-main1:hover:before{
            display: block;
        }
        .dropdown-item-main1:hover{
            color:#0b6f6b
        }
    </style>
</head>
<body>
<div class="header" id="header">
    <!-- Start Top Header -->
    <nav class="navbar navbar-expand-lg shadow-none ">
        <div class="container justify-content-cente">
            <a class="col-12 col-md-3 my-2  justify-content-md-start justify-content-center  navbar-brand d-flex" href="#">
                <img src="{{asset('assent/imgs/logo.png')}}" class="ms-2 img-logo  ">
                <h4 class="color_home size-20 mb-0 " >بوابة روافد التعليمية <br>
                    <small class="size-12 color-black"> الموقع التعليمي الأول في فلسطين </small>
                </h4>
            </a>
            <form class="col-12 col-md-3 my-2   justify-content-center d-flex rounded-pill p-1">
                <input class="form-control me-2 border-0 border-left  size-11 " type="search" placeholder="ابحث عن المعلم / المبحث" aria-label="Search">
                <a href="#" class="text-center " type="submit">
                    <i class="fa fa-search btn_search rounded-circle"></i>
                </a>
            </form>
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <a href="#" class="d-flex  btn_web rounded-pill py-1 ">
                    <img src="{{asset('assent/imgs/final22-01.png')}}"  class="my-auto me-3 position-relative" style="width:13% !important; right: 0" >
                    <h1 class="size-16 text-center me-4 text my-auto"  style=" display: grid;">
                        قناة روافد التعليمية
                    </h1>
                </a>

            </div>
            <div class=" col-12 col-md-3 my-2 d-flex justify-content-center me-auto mb-2 mb-lg-0  ">

                <div class="d-flex">
                    <div class="nav-link  text-center " aria-current="page" >
                        <img src="{{asset('assent/imgs/avatar.png')}}" class="img-user" alt="">
                    </div>
                    <div class="my-auto">
                        <a href="#" class="text-brouwn mb-0 size-14">خالد محمد فارس</a>
                        <small class="badge  bg-warning text-brouwn  rounded-pill size-11">مشرف تربوي</small>
                    </div>

                </div>
                <ul class="px-0">
                    <li class="nav-item d-flex justify-content-center align-items-center ">
                        <a class="nav-link  text-center px-1" aria-current="page" href="#">
                            <i class="fa fa-bell btn_icon rounded-circle"></i>
                        </a>

                        <a class="nav-link  text-center px-1 " aria-current="page" href="#">
                            <i class="fa fa-cog btn_icon rounded-circle" aria-hidden="true"></i>
                        </a>
                        <a class="nav-link  text-center px-1 " aria-current="page" href="#">
                            <i class="fa fa-sign-out btn_icon rounded-circle" aria-hidden="true"></i>
                        </a>
                        <button class="navbar-toggler px-0 mx-auto  btn_icon rounded-circle " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars"></i>

                        </button>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- End Top Header -->
    <!-- Start Nav_link Header -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container navbar-light  menu-bar  ">


            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav text-center mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                          <span class="home">
                              <i class="fa-solid fa-house"></i>
                          </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="materials.html">المواد الإثرائية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lessons_vedio.html">الدروس التعليمية المٌصوّرة </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الاختبارات الالكترونية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.html">المناهج الدارسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الصفوف الافتراضية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Nav_link Header -->
</div>
<div class="container file_view mt-5 profile cpanel">
    <div class="d-flex flex-column video-show mt-3 order-0 card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 col-9 d-flex flex-column justify-content-sm-center justify-content-md-center text-center"
                 style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: -32px;">
                <h4 class="my-auto text-white size-18 py-2" >لوحة تحكم ملف الإنجاز</h4>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <div class="aside">
            <div class=" d-flex flex-column justify-content-center">
                <img src="{{asset('assent/imgs/avatar.png')}}" class="card-img-top bk-gry border-20 border-bottom mx-auto  border-4 "
                     style="width: 100px;height: 100px;" alt="...">
                <div class="card-body mb-5">
                    <div class="col-12 col-md-12 d-flex flex-column">
                        <h4 class="my-auto color_home size-18 d-flex justify-content-center align-items-center ml-2" >
                            <span>خالد محمد فارس  </span>
                            <a href="#"
                               class="me-2">
                                    <span>
                                      <i class="fa fa-share-nodes mx-auto" ></i>
                                    </span>
                            </a>
                        </h4>
                        <div class="col-12 col-md-12 d-flex flex-row justify-content-evenly my-2">
                            <a href="#"
                               class="mr-2 view-as">

                                    <span href="#" class="" data-bs-toggle="tooltip" data-bs-html="true" title="https://rawafed.edu.ps/ar/khaled-fares">

                                      <i class="fa fa-eye mx-auto"></i>
                                      عرض  ملف الإنجاز

                                    </span>
                            </a>
                        </div>
                    </div>
                    <ul class="ul-aside d-flex flex-column justify-content-center mb-5 pb-3"  >
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start ">
                                <a href="cpanel.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3 active">
                                        <span>
                                          <i class="fa fa-user mx-auto"></i>
                                             <span class="text-a">البيانات الشخصية</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="qualifications.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-book mx-auto"></i>
                                          <span class="text-a">المؤهلات العلمية</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="experience.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-book-open-reader mx-auto"></i>
                                            <span class="text-a">الخبرات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="courses.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-cube mx-auto"></i>
                                            <span class="text-a">الدورات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="skills.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-computer-mouse mx-auto"></i>
                                            <span class="text-a">المهارات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="languages.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-language mx-auto"></i>
                                            <span class="text-a">اللغات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="memberships.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-address-card mx-auto"></i>
                                            <span class="text-a">العضويات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="socialMedia.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-link mx-auto"></i>
                                          <span class="text-a">مواقع التواصل الاجتماعي</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="classifications.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-newspaper mx-auto"></i>
                                            <span class="text-a">التصنيفات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="articles.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-newspaper mx-auto"></i>
                                            <span class="text-a">المقالات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="initiatives.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                        <span>
                                          <i class="fa fa-feather mx-auto"></i>
                                            <span class="text-a">المبادرات</span>
                                        </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="achievements.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                    <span>
                                      <i class="fa fa-sun mx-auto"></i>
                                        <span class="text-a">الإنجازات</span>
                                    </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="awards.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                    <span>
                                      <i class="fa fa-award mx-auto"></i>
                                       <span class="text-a"> الجوائز والمسابقات</span>
                                    </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="comments.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                    <span>

                                      <i class="fas fa-comment mx-auto"></i>
                                       <span class="text-a"> التعليقات </span>
                                    </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-12 col-md-12 mb-2 justify-content-center">
                            <div class="dropdown d-flex justify-content-start">
                                <a href="messages.html"
                                   class="d-flex align-content-start title-cpanel p-1 pe-3">
                                    <span>
                                        <i class="fas fa-envelope mx-auto"></i>
                                       <span class="text-a"> الرسائل الواردة </span>
                                    </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
<!-- main content -->
<!--footer-->
<section class="footer container pt-3 mt-2">
    <div class="bk-rounded"></div>
    <div class="row pb-3 d-flex justify-content-around" >
        <div class="col-12 col-md-4 d-flex wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="">
                <img src="{{asset('assent/imgs/logo_Nx.png')}}" alt="">
            </div>
            <div class=" me-3 pt-2 ">
                <h6 class="text-white mb-3 size-14">وزارة التربية والتعليم العالي- فلسطين</h6>
                <h6 class="text-white mb-3 size-14">الإدارة العامة للتقنيات التربوية</h6>
                <h6 class="text-white mb-3 size-14">التعليم الإلكتروني</h6>
                <h6 class="text-white mb-3 size-14"><i class="fa fa-envelope-o color_orng ms-2"></i>info@rawafed.edu.ps</h6>
                <h6 class="text-white mb-3 size-14"><i class="fa fa-phone color_orng ms-2"></i>970/8-2889053+</h6>
            </div>
        </div>
        <div class="col-12 col-md-4 links wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <h3 class="text-white size-24 pe-4">روابط</h3>
            <ul class="row d-flex flex-row">
                <li class="text-white col-12 col-md-6 text_link my-1"><a href="#" class="text-white size-14"><i class="fa fa-link ms-2 color_orng"></i> الرئيسية</a></li>
                <li class="text-white col-12 col-md-6 text_link my-1"><a href="#" class="text-white size-14"><i class="fa fa-link ms-2 color_orng"></i> حقوق النشر </a></li>
                <li class="text-white col-12 col-md-6 text_link my-1"><a href="#" class="text-white size-14"><i class="fa fa-link ms-2 color_orng"></i> عن التعليم الإلكتروني</a></li>
                <li class="text-white col-12 col-md-6 text_link my-1"><a href="#" class="text-white size-14"><i class="fa fa-link ms-2 color_orng"></i> دليل استخدام موقع روافد</a></li>
                <li class="text-white col-12 col-md-6 text_link my-1"><a href="#" class="text-white size-14"><i class="fa fa-link ms-2 color_orng"></i> بيان الخصوصية  </a></li>

            </ul>
        </div>
    </div>
    <div class="row border-top mx-5 py-5 px-5 wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
        <div class="col-12 col-md-5">
            <h3 class="text-white size-16">تخضع المحتويات التعليمية في بوابة روافد التعليمية
                :لقوانين الملكيّة الفكريّة وترخيص المشاع الإبداعي التالي </h3>
        </div>
        <div class="col-12 col-md-3">
            <a rel="license" style="text-decoration: none;" class="col-12 text-center font-24 mt-2" target="_blank"
               href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.ar?fbclid=IwAR2FE8fCEntGuRkthCFx8tDhfXQVpknWNGLaLi7OIxyWMNR36XzBB7hIikg" title="Creative Commons Attribution 4.0 International license">
                <span id="cc-logo" class="icon" data-toggle="tooltip" data-placement="top" data-original-title=" حقوق المشاع الإبداعي"><img class="img-fluid" width="35px" alt="cc logo" src="{{asset('assent/imgs/nd_white_x2@2x.png')}}"></span>
                <span id="cc-icon-nd" class="icon mx-1" data-toggle="tooltip" data-placement="top" data-original-title="يجب عليك نسب العمل لبوابة روافد التعليمية بطريقة مناسبة"><img class="img-fluid" width="35px" src="{{asset('assent/imgs/nc_white_x2@2x.png')}}"></span>
                <span id="cc-attribution" class="icon mx-1" data-toggle="tooltip" data-placement="top" data-original-title="لا يمكنك استخدام محتويات بوابة روافد لأغراض تجارية"><img class="img-fluid" width="35px" src="{{asset('assent/imgs/attribution_icon_white_x2@2x.png')}}"></span>

            </a>
        </div>
        <div class="col-12 col-md-4 link-social">
            <ul class="ps-0 d-flex justify-content-end">
                <li class="my-2 ms-3">
                    <a href = "#" class="size-26 "><i class="fa fa-youtube-play  "></i> </a>
                </li>
                <li class="my-2">
                    <a href = "#" class="size-24  p-2  ">
                        <i class="fa-brands fa-facebook"></i>
                     </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<div class="position-fixed " style="bottom: 58px;right: 26px;">
    <a href="#" class="text-center">
        <i class="fa-sharp fa-solid fa-angle-up btn_icon rounded-circle d-flex justify-content-center align-items-center" style="width: 50px !important; height: 50px !important;"></i>
{{--
        <i class="fa-solid fa-angle-up btn_icon rounded-circle size-24 d-flex justify-content-center align-items-center" style="width: 50px !important; height: 50px !important;">
--}}
        </i>
    </a>
</div>

<!-- edit bio modal -->
<div class="modal fade bio-eModal" id="edit-bio-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
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
</div>
</div>
<!-- edit bio modal end -->
<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Page level custom scripts -->
<script src="{{asset('assent/js/datatables-demo.js')}}"></script>
<script src="{{asset('assent/js/jquery1.dataTables.min.js')}}"></script>
<script src="{{asset('assent/js/script.js')}}"></script>
</body>
</html>
