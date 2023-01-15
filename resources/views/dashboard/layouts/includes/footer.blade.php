<link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">

<!--start Footer-->
@if(url()->current() == route('site.index'))
    <section class="footer mt-5 pt-3">
        <div class="bk-rounded" style="border-radius: 64px 64px 0px 0px;"></div>
        <x-footer />
    </section>
@else
    <section class="footer container pt-3 mt-2">
        <div class="bk-rounded"></div>
        <x-footer />
    </section>
@endif

<div class="position-fixed " style="bottom: 58px;right: 26px;">
    <a href="#" class="text-center">
        <i class="fa fa-angle-up btn_icon rounded-circle size-24 d-flex justify-content-center align-items-center" style="width: 50px !important; height: 50px !important;">
        </i>
    </a>
</div>

