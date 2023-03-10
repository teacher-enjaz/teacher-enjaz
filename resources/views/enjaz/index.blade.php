@extends('enjaz.layout.layout')

@section('title')
@endsection

@section('content')
    <div class="main-content  mb-5" style="width: 90%;" id="user" data-name="{{$name_en}}">
        <ul class="nav nav-pills mb-3 rounded-pill shadow-dark d-flex justify-content-between" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-articles-tab" data-bs-toggle="pill" data-bs-target="#pills-articles" type="button" role="tab" aria-controls="pills-articles" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" المقالات">  <i class="fa fa-newspaper mx-auto"></i>
                    <span class="text-a">المقالات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-initiatives-tab" data-bs-toggle="pill" data-bs-target="#pills-initiatives" type="button" role="tab" aria-controls="pills-initiatives" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" المبادرات">   <i class="fa fa-feather mx-auto"></i>
                    <span class="text-a">المبادرات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-achievements-tab" data-bs-toggle="pill" data-bs-target="#pills-achievements" type="button" role="tab" aria-controls="pills-achievements" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" الإنجازات">   <i class="fa fa-sun mx-auto"></i>
                    <span class="text-a">الإنجازات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-awards-tab" data-bs-toggle="pill" data-bs-target="#pills-awards" type="button" role="tab" aria-controls="pills-awards" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title="الجوائز و المسابقات ">  <i class="fa fa-award mx-auto"></i>
                    <span class="text-a"> الجوائز والمسابقات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pills-qualification-data-tab" data-bs-toggle="pill" data-bs-target="#pills-qualification" type="button" role="tab" aria-controls="pills-qualification" aria-selected="false"><i class="fa fa-book mx-auto"  data-bs-toggle="tooltip" data-bs-html="true" title="المؤهلات العلمية "></i>
                    <span class="text-a">المؤهلات العلمية</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-experiences-tab" data-bs-toggle="pill" data-bs-target="#pills-experiences" type="button" role="tab" aria-controls="pills-experiences" aria-selected="false"> <i class="fa fa-book-open-reader mx-auto"  data-bs-toggle="tooltip" data-bs-html="true" title="الخبرات "></i>
                    <span class="text-a">الخبرات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-courses-tab" data-bs-toggle="pill" data-bs-target="#pills-courses" type="button" role="tab" aria-controls="pills-courses" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title="الدورات "> <i class="fa fa-cube mx-auto"></i>
                    <span class="text-a">الدورات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-skills-tab" data-bs-toggle="pill" data-bs-target="#pills-skills" type="button" role="tab" aria-controls="pills-skills" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" المهارات">  <i class="fa fa-computer-mouse mx-auto"></i>
                    <span class="text-a">المهارات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-languages-tab" data-bs-toggle="pill" data-bs-target="#pills-languages" type="button" role="tab" aria-controls="pills-languages" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title="اللغات ">   <i class="fa fa-language mx-auto"></i>
                    <span class="text-a">اللغات</span></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-memberships-tab" data-bs-toggle="pill" data-bs-target="#pills-memberships" type="button" role="tab" aria-controls="pills-memberships" aria-selected="false"  data-bs-toggle="tooltip" data-bs-html="true" title=" العضويات">  <i class="fa fa-address-card mx-auto"></i>
                    <span class="text-a">العضويات</span></button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-articles" role="tabpanel" aria-labelledby="pills-articles-tab">

            </div>
            <div class="tab-pane fade" id="pills-initiatives" role="tabpanel" aria-labelledby="pills-initiatives-tab">

            </div>
            <div class="tab-pane fade" id="pills-achievements" role="tabpanel" aria-labelledby="pills-achievements-tab">

            </div>
            <div class="tab-pane fade" id="pills-awards" role="tabpanel" aria-labelledby="pills-awards-tab">

            </div>
            <div class="tab-pane fade " id="pills-qualification" role="tabpanel" aria-labelledby="pills-qualification-data-tab">

            </div>
            <div class="tab-pane fade" id="pills-experiences" role="tabpanel" aria-labelledby="pills-experiences-tab">

            </div>
            <div class="tab-pane fade" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">

            </div>
            <div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">

            </div>
            <div class="tab-pane fade" id="pills-languages" role="tabpanel" aria-labelledby="pills-languages-tab">

            </div>
            <div class="tab-pane fade" id="pills-memberships" role="tabpanel" aria-labelledby="pills-memberships-tab">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let name = $('#user').data('name')
        console.log(name)
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getMemberships`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-memberships').empty();
                    $('#pills-memberships').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getLanguages`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-languages').empty();
                    $('#pills-languages').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getSkills`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-skills').empty();
                    $('#pills-skills').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getCourses`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-courses').empty();
                    $('#pills-courses').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getExperiences`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-experiences').empty();
                    $('#pills-experiences').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getQualifications`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-qualification').empty();
                    $('#pills-qualification').html(data.html);
                  }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getAwards`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-awards').empty();
                    $('#pills-awards').html(data.html);
                }
            });
        })
        $(document).ready(function (e)
        {
            $.ajax({
                url: `/enjaz/${name}/getArticles`,
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
                url: `/enjaz/${name}/getAchievement`,
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
                url: `/enjaz/${name}/getInitiative`,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#pills-initiatives').empty();
                    $('#pills-initiatives').html(data.html);
                }
            });
        })
    </script>
@endsection
