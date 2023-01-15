<!DOCTYPE html>
<html lang="ar" dir="{{app()->getLocale()=== 'ar' ? 'rtl':'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">
    <link href="{{asset('rawafed/assent/styles/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('rawafed/assent/styles/css/Merge-style.css')}}" id="styles1" />
    {{--<link rel="stylesheet" href="{{asset('rawafed/assent/styles/css1/Merge-style.css')}}" />--}}
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{config('app.name')}}</title>
    <x-favicon />
    <link rel="shortcut icon" type="image/png" href="{{isset($siteInfo) ? asset('template/images/information/'.$siteInfo->favicon): '' }}">
</head>
<body style="background-image:url('../../rawafed/assent/imgs/bk-login.webp'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100%; background-color: #F7F2D2;" onload="normalMode1()">
<section class="container mt-5  my-auto">
    <div class="logo mb-1 mt-5 d-flex justify-content-center">
        @if(isset($siteInfo))
            <img src="{{url('/storage/information/'.$siteInfo->favicon)}}" class="" width="100px" height="100px">
        @else
            <img src="{{asset('rawafed/assent/imgs/logo.png')}}" class="" width="100px" height="100px">
            <h4 class="color_home size-26 mb-0 me-2 align-self-center" >
                @if(isset($siteInfo))
                    {{app()->getLocale() == 'ar' ? $siteInfo->site_name_ar: $siteInfo->site_name_en}}
                @else
                    {{__('site.rawafedGate')}}
                @endif
                <br>
                <small class="size-15 color-black"> {{__('site.slogan')}} </small>
            </h4>
        @endif
    </div>
    @yield('content')
</section>
{{--@include('site.layouts.footer')--}}

{{--@include('dashboard.layouts.includes.footer')--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('template/js/main.js')}}"></script>
<!-- Data table plugin-->

<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('template/js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('template/js/plugins/chart.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/plugins/sweetalert.min.js')}}"></script>
<!-- Essential javascripts for application to work-->

<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
@yield('script')
<script>
    function normalMode1() {
        $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css/Merge-style.css')}}")
    }
</script>
</body>
</html>
