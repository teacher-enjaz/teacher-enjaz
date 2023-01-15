<!DOCTYPE html>
<html lang="ar" dir="{{app()->getLocale()=== 'ar' ? 'rtl':'ltr'}}">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="keywords" content="@yield('meta_keywords','موقع روافد التعليمي, rawafed, بوابة روافد التعليمية, البطاقات التعليمية, بطاقات التعلم الذاتي, المواد التعليمية, المواد الإثرائية, الدروس المصورة, الكتب الدراسية, الصفوف الافتراضية')">
    <meta name="description" content="@yield('meta_description','تقدم روافد بيئة تعليم إلكترونية مرنة وسهلة الاستخدام تعمل على تحسين تعلم الطلبة وتواصلهم مع القائمين على العملية التعليمية، بالإضافة إلى نشر ثقافة التعليم الإلكتروني في المجتمع المحلي، وذلك باستخدام أدوات التعليم الإلكتروني وحوسبة المناهج الدراسية، والأدوات التكنولوجية الحديثة، وتدريب جميع الفئات المستفيدة من هذه البيئة على استخدامها فيما يحقق أهداف وزارة التربية والتعليم العالي بفلسطين، ويدعم عمليتي التعليم والتعلم النوعية.')">
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="{{__('site.rawafedGate')}}">
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:type" content="article"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rawafed" />
    <meta property="twitter:title" content="@yield('title')"/>
    <meta property="twitter:image" content="@yield('image')"/>
    <meta property="og:image" content="@yield('image')"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="twitter:url" content="{{url()->current()}}"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="twitter:description" content="@yield('meta_description')"/>
    <meta property='og:video:url' content="@yield('video_url')" />
    <meta property="og:video:width" content="400px">
    <meta property="og:video:height" content="300px">
    <meta property="og:type" content="video.movie" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('rawafed/assent/styles/css/index.css')}}" id="styles2"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('rawafed/assent/styles/font-awesome.min.css')}}">
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <x-favicon />
    <title>@yield('title')</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-47872188-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-47872188-1');
    </script>
</head>
<style>
    input[type="date"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }
</style>
@yield('style')
<body @if(url()->current() != route('site.index')) style="background-image:url('../../rawafed/assent/imgs/bk-login.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100%; background-color: #F7F2D2;"@endif onload="normalMode2()">
@include('dashboard.layouts.includes.header')
@yield('content')
@include('dashboard.layouts.includes.footer')
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{asset('template/js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="{{asset('template/js/popper.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('template/js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('template/js/plugins/chart.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/plugins/sweetalert.min.js')}}"></script>
<script type="module" src="{{asset('js/firebase.js')}}"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>

<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
<script>
    $('.delete-confirm').click(function(event){
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: "هل تريد الحذف بالتأكيد؟.",
            text: "سيتم نقل بياناتك لسلة المحذوفات",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "نعم حذف",
            cancelButtonText: "إلغاء",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: "تم الحذف",
                    text: "تم الحذف",
                    type: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
                window.location.href = url;
            } else {
                swal({
                    title: "إلغاء",
                    text: "تم إلغاء الحذف",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
            }
        });
    });
</script>
<script>
    $('.delete-trashed').click(function(event){
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: "هل تريد الحذف بالتأكيد؟.",
            text: "لا يمكنك استعادة البيانات بعد الحذف",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "نعم حذف",
            cancelButtonText: "إلغاء",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: "تم الحذف",
                    text: "تم الحذف",
                    type: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
                window.location.href = url;
            } else {
                swal({
                    title: "إلغاء",
                    text: "تم إلغاء الحذف",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
            }
        });
    });
</script>
@yield('script')
<script>
    function normalMode2() {
        $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css/index.css')}}")
    }
</script>
</body>
</html>
