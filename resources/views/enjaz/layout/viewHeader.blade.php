<style>
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

<div class="header" id="header">
    <!-- Start Top Header -->
    <nav class="navbar navbar-expand-lg shadow-none ">
        <div class="container">
            <div class="col-12 col-md-3">
            <a class="my-2 justify-content-md-start justify-content-center  navbar-brand d-flex" href="#">
                <img src="{{asset('enjaz/assent/imgs/logo.png')}}" class="ms-2 img-logo  ">
                <h4 class="color_home size-20 mb-0 " > ملف إنجاز المعلم
                    <br>
                    {{--<small class="size-12 color-black"> منصة روافد التعليمية</small>--}}
                </h4>
            </a>
            <div class="dropdown show" style="margin-top: -40px;margin-right: 15px;margin-bottom: 2px">
                <a class="badge bg-warning text-dark rounded-pill size-12 flex-column dropdown-toggle dropdown-toggle1" href="#"
                   role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false" style="width:fit-content;margin-right: 70px;margin-top: -12px;">
                    منصة روافد التعليمية
                </a>
                <div class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item-main1 text-right text-size" href="{{--{{route('site.index')}}--}}" target="_blank">بوابة روافد التعليمية</a>
                    <a class="dropdown-item-main1 text-right text-size" href="{{--{{route('tv.index')}}--}}" target="_blank">قناة روافد التعليمية</a>
                    <a class="dropdown-item-main1 text-right text-size" href="http://eduplus.ps" target="_blank">حاضنة الإبداع التعليمي</a>
                </div>
            </div>
            </div>
            <form class="col-12 col-md-6 my-2   justify-content-center d-flex rounded-pill p-1 view-search">
                <input class="form-control me-2 border-0 border-left  size-11 " type="search" placeholder="ابحث عن مقالة / مبادرة / إنجاز" aria-label="Search">
                <a href="#" class="text-center " type="submit">
                    <i class="fa fa-search btn_search rounded-circle"></i>
                </a>
            </form>
        </div>
    </nav>
    <!-- End Top Header -->
</div>

