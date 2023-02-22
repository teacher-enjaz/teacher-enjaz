<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>بوابة روافد التعليمية</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('enjaz/assent/styles/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('enjaz/assent/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" href="assent/styles/font-awesome.min.css">-->
    {{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <link rel="stylesheet" href="assent/styles/sb-admin-2.css"> -->
    <link rel="stylesheet" href="{{asset('enjaz/assent/styles/css/styles.css')}}" id="styles"/>
    <link rel="stylesheet" href="{{asset('enjaz/assent/styles/css/styles2.css')}}" id="style"/>
    <link rel="stylesheet" href="{{asset('enjaz/assent/js/jquery1.dataTables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
            /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar {
            visibility: hidden; /* Hidden by default. Visible on click */
            min-width: 250px; /* Set a default minimum width */
            margin-left: -125px; /* Divide value of min-width by 2 */
            background-color: #109f99; /* Black background color */
            color: white; /* White text color */
            text-align: center; /* Centered text */
            border-radius: 25px; /* Rounded borders */
            padding: 16px; /* Padding */
            position: fixed; /* Sit on top of the screen */
            z-index: 1; /* Add a z-index if needed */
            left: 50%; /* Center the snackbar */
            bottom: 30px; /* 30px from the bottom */
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
            visibility: visible; /* Show the snackbar */
            /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
            However, delay the fade out process for 2.5 seconds */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        /*check mark*/
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }

        body{
            background-image: url(../../enjaz/assent/imgs/bk-login.png);
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
    @include('dashboard.layouts.enjaz-layouts.header')
    @yield('content')
    @include('dashboard.layouts.enjaz-layouts.footer')
<!-- edit bio modal end -->
<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('script')
    <!-- Page level custom scripts -->
{{--<script src="{{asset('enjaz/assent/js/datatables-demo.js')}}"></script>--}}
{{--<script src="{{asset('enjaz/assent/js/jquery1.dataTables.min.js')}}"></script>--}}
<script src="{{asset('enjaz/assent/js/script.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('template/js/plugins/sweetalert.min.js')}}"></script>--}}
<script>
        $('.delete-trashed').click(function(event){
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'هل تريد الحذف بالتأكيد؟',
                text: "لا يمكنك استعادة البيانات بعد الحذف",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#109f99',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم حذف!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    text: "تم الحذف بنجاح",
                    type: "success",
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonColor: '#109f99',
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }).then(function(){window.location.href = url;});
                }else{
                    Swal.fire({
                        title: 'إلغاء',
                        text: "تم إلغاء الحذف",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'موافق',
                        closeOnConfirm: true,
                        closeOnCancel: true
                    })
                }
            })
        });
    </script>
    <script>
        $('#allow_comments').on('click',function () {
            var checkBox = document.getElementById('allow_comments');
            if(checkBox.checked === true)
            {
                $('#allow_comments').val("1")
                $('#allow_comments').attr('checked','checked')
            }
            else
            {
                $('#allow_comments').val("0")
                $('#allow_comments').removeAttr('checked')
            }
        })
    </script>
</body>
</html>
