@extends('enjaz.layout.viewLayout')

@section('title')
@endsection

@section('content')
    <div class="px-0 mt-3 container-fluid">
        <div class="nav-link d-flex rounded-pill w-75 text-center mx-auto bg-white" style="border-radius: 50px !important;">
            <ul class="nav nav-pills shadow-dark d-flex align-items-center w-50 justify-content-start border-leftt " id="pills-tab" role="tablist">
                {{--                <li class="light-text me-5">تصفية</li>--}}
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-articles-tab" data-bs-toggle="pill" data-bs-target="#pills-articles" type="button" role="tab" aria-controls="pills-articles" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" المقالات">
                        <span class="size-18">المقالات</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-initiatives-tab" data-bs-toggle="pill" data-bs-target="#pills-initiatives" type="button" role="tab" aria-controls="pills-initiatives" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" المبادرات">
                        <span class="text-18">المبادرات</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-achievements-tab" data-bs-toggle="pill" data-bs-target="#pills-achievements" type="button" role="tab" aria-controls="pills-achievements" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" الإنجازات">
                        <span class="text-18">الإنجازات</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-awards-tab" data-bs-toggle="pill" data-bs-target="#pills-awards" type="button" role="tab" aria-controls="pills-awards" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title="الجوائز و المسابقات ">
                        <span class="text-18"> الجوائز والمسابقات</span>
                    </button>
                </li>
            </ul>
            <div class="nav-item w-50 " role="presentation">
                <div class="w-100" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false" >
                    <form class="col-12 col-md-6  justify-content-center d-flex  p-1 view-search">
                        <input class="form-control me-2 border-0 border-left size-11 " type="search" placeholder="ابحث عن مقالة / مبادرة / إنجاز" aria-label="Search">
                        <a href="#" class="text-center " type="submit">
                            <i class="fa fa-search btn_search rounded-circle"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white">
        <div class="main-content mt-1" style="width: 100%;">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-articles" role="tabpanel" aria-labelledby="pills-articles-tab">

                </div>
                <div class="tab-pane fade" id="pills-initiatives" role="tabpanel" aria-labelledby="pills-initiatives-tab">

                </div>
                <div class="tab-pane fade" id="pills-achievements" role="tabpanel" aria-labelledby="pills-achievements-tab">

                </div>
                <div class="tab-pane fade" id="pills-awards" role="tabpanel" aria-labelledby="pills-awards-tab">

                </div>
            </div>
        </div>
    </div>
    <!-- main content -->
@endsection

@section('script')
    <script>
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/main/getAllArticles`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-articles').empty();
                    $('#pills-articles').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/main/getAllAchievement`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-achievements').empty();
                    $('#pills-achievements').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/main/getAllInitiative`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-initiatives').empty();
                    $('#pills-initiatives').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/main/getAllAwards`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-awards').empty();
                    $('#pills-awards').html(data.html);
                }
            });
        })
    </script>
@endsection
