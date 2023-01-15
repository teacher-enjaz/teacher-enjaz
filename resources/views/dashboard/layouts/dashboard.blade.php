<!DOCTYPE html>
<html lang="ar" dir="{{app()->getLocale()=== 'ar' ? 'rtl':'ltr'}}">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">

      <x-favicon />
      <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
  </head>
  <body class="app sidebar-mini">

    <!-- Navbar-->
    @include('dashboard.layouts.includes.header')

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('dashboard.layouts.includes.sidebar')

    <main class="app-content">
        @yield('content')
    </main>
    @include('dashboard.layouts.includes.footer')
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{asset('js/plugins/chart.js')}}"></script>
    <!-- Essential javascripts for application to work-->
    {{--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="{{asset('template/js/main.js')}}"></script>
    <!-- Data table plugin-->

    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('template/js/plugins/pace.min.js')}}" async></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{asset('template/js/plugins/chart.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('template/js/plugins/sweetalert.min.js')}}"></script>

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
            console.log(url);
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
  </body>
</html>
