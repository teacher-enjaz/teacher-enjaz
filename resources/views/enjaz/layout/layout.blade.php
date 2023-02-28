<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بوابة روافد التعليمية</title>
    <link href="{{asset('enjaz/assent/styles/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('enjaz/assent/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" href="assent/styles/font-awesome.min.css">-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <link rel="stylesheet" href="assent/styles/sb-admin-2.css"> -->
    <link rel="stylesheet" href="{{asset('enjaz/assent/styles/css/styles.css')}}" id="styles"/>
    <link rel="stylesheet" href="{{asset('enjaz/assent/styles/css/view-style.css')}}" id="style"/>
    <!--<link rel="stylesheet" href="assent/js/jquery1.dataTables.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
<body>
    @include('enjaz.layout.header')
    <div class="container  view-panel profile cpanel">
        <div class="d-flex flex-column video-show mt-3 order-0 card-body">
            <div class="row d-flex justify-content-center">

            </div>
        </div>
        <div class="d-flex">
            <x-user-side-bar-enjaz/>
            @yield('content')
        </div>
    </div>
    @include('enjaz.layout.footer')
<!-- main content -->
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('enjaz/assent/js/datatables-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('enjaz/assent/js/script.js')}}"></script>
    @yield('script')
</body>
</html>
