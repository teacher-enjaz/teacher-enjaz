<div class="section-stage mb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 mt-3 align-self-start">
                <div class="row " >
                    <div class="col-12 col-md-12 d-flex text-center my-2  wow fadeInUp" data-wow-delay=".2ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <h4 class="my-auto color_home size-26">
                            @if(url()->current() == route('site.fileMaterials'))
                                <img src="{{asset('rawafed/assent/imgs/document1.png')}}"  class="mx-auto " width="30px" >
                                {{__('site.fileMaterials')}}
                            @elseif(url()->current() == route('site.videoLessons'))
                                <img src="{{asset('rawafed/assent/imgs/Play1.png')}}" class="mx-auto" width="20px" >
                                {{__('site.picturedLessons')}}
                            @elseif(url()->current() == route('site.books'))
                                <img src="{{asset('rawafed/assent/imgs/book1.png')}}" class="mx-auto" width="20px" >
                                {{__('site.books')}}
                            @elseif(url()->current() == route('site.eCards'))
                                <img src="{{asset('rawafed/assent/imgs/checklist1.png')}}" class="mx-auto" width="50px" >
                                {{__('site.cards')}}
                            @elseif(url()->current() == route('site.ministry-exam-forms'))
                                <img src="{{asset('rawafed/assent/imgs/checklist1.png')}}" class="mx-auto" width="50px" >
                                {{__('site.examForms')}}
                            @elseif(url()->current() == route('site.all-cards'))
                                <img src="{{asset('rawafed/assent/imgs/checklist1.png')}}" class="mx-auto" width="50px" >
                                {{__('dashboard.AllCards')}}
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="row d-block d-md-none">
                    <div class="col-12 col-md-6 mx-auto">
                        <nav id="myNavbar" class="navbar navbar-light py-0 d-flex flex-column">
                            <div class="d-flex  position-relative ">
                                <h3 class="size-14 text-brouwn  text-end  mx-auto bk_orng rounded-pill py-2 px-3" style="z-index: 1;">
                                    المراحل الدراسية
                                </h3>
                                <hr class=" position-absolute" style="top: 1px; height: 1px; width: 350px; right: -102px;">
                            </div>
                            @if($levels->count() > 0)
                                @foreach($levels as $level)
                                    <div class="row justify-content-center">
                                        <div class="col-6 col-md-6 d-flex justify-content-center  mt-3 grade_first_btn">
                                            <div class="dropdown mb-3  mx-auto">
                                                <button class=" mx-auto drop-down__button dropdown-toggle py-1 px-3 border-0 bk-fav text-white rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{app()->getLocale() == 'ar' ? $level->name_ar : $level->name_en}}
                                                </button>
                                                <ul class="dropdown-menu drop-down__menu border-0 " aria-labelledby="dropdownMenuButton1">
                                                    @if($level->grade->count() > 0)
                                                        @foreach($level->grade as $grade)
                                                            @if($grade->parent_id == null && $grade->child->count() == 0)
                                                                <li class="drop-down__item grade1"
                                                                    id="grade1{{$grade->id}}"
                                                                    data-name="{{app()->getLocale() == 'ar' ? $grade->name_ar : $grade->name_en}}"
                                                                    data-page="{{request()->route()->getName()}}"
                                                                    data-type="grade1"
                                                                >
                                                                    <a class="text-center gradeList" id="gradeList1{{$grade->id}}" href="javascript:;"  onclick="gradeLink({{$grade->id}})">
                                                                        {{app()->getLocale() == 'ar' ? $grade->name_ar : $grade->name_en}}
                                                                    </a>
                                                                </li>
                                                            @else
                                                                @foreach($grade->child as $child)
                                                                    <li class="drop-down__item grade3"
                                                                        id="grade3{{$child->id}}"
                                                                        data-name="{{app()->getLocale() == 'ar' ? $child->parent_name_ar .' - '. $child->name_ar : $child->parent_name_en .' - '. $child->name_en}}"
                                                                        data-page="{{request()->route()->getName()}}"
                                                                        data-type="child1"
                                                                    >
                                                                        <a class="text-center" id="gradeList3{{$child->id}}" href="javascript:;"  onclick="gradeLink({{$child->id}})">
                                                                            {{app()->getLocale() == 'ar' ? $child->name_ar : $child->name_en}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </nav>
                    </div>
                </div>
                <div class="d-md-block d-none">
                <div class="row left-content mt-2 header-text" >
                    <!--بداية المرحلة -->
                    @if($levels->count() > 0)
                        @foreach($levels as $level)
                            <div class=" col-12 col-md-4 container-fluid ">
                                <ul class="px-md-0">
                                    <li>
                                        <div class="d-flex  position-relative wow bounceInUp animated">
                                            <h3 class="size-14 text-brouwn  text-end  mx-auto bk_orng rounded-pill py-2 px-3" style="z-index: 1;">
                                                {{app()->getLocale() == 'ar' ? $level->name_ar : $level->name_en}}
                                            </h3>
                                            <hr class="w-100 me-auto position-absolute" style="top: 3px; height: 1px;">
                                        </div>
                                    </li>
                                    <ul class="row d-flex justify-content-around px-0" >
                                        @if($level->grade->count() > 0)
                                            @foreach($level->grade as $grade)
                                                @if($grade->parent_id == null && $grade->child->count() == 0)
                                                    <li class="col-4 col-md-2 text-center d-flex align-items-center justify-content-center
                                                      btn_icon_stage rounded-pill m-1 wow bounceInUp animated grade"
                                                        id="grade{{$grade->id}}"
                                                        data-name="{{app()->getLocale() == 'ar' ? $grade->name_ar : $grade->name_en}}"
                                                        data-page="{{request()->route()->getName()}}"
                                                        data-type="grade"
                                                    >
                                                        <a href="javascript:;"  onclick="gradeLink({{$grade->id}})"
                                                           class="my-auto size-14 py-2 text-color-stage">
                                                            {{app()->getLocale() == 'ar' ? $grade->name_ar : $grade->name_en}}
                                                        </a>
                                                    </li>
                                                @else
                                                    @foreach($grade->child as $child)
                                                        <li class="col-4 col-md-4 text-center d-flex align-items-center justify-content-center
                                                         btn_icon_stage rounded-pill m-1 wow bounceInUp animated grade2"
                                                            id="grade2{{$child->id}}"
                                                            data-name="{{app()->getLocale() == 'ar' ? $child->parent_name_ar .' - '. $child->name_ar : $child->parent_name_en .' - '. $child->name_en}}"
                                                            data-page="{{request()->route()->getName()}}"
                                                            data-type="child"
                                                        >
                                                            <a href="javascript:;"  onclick="gradeLink({{$child->id}})"
                                                               class="my-auto size-14 py-2 text-color-stage">
                                                                {{app()->getLocale() == 'ar' ? $child->name_ar : $child->name_en}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function gradeLink(id)
    {
        var type = $('#grade'+id).data('type');
        var type1 = $('#grade2'+id).data('type');
        var type2 = $('#grade1'+id).data('type');
        var type3 = $('#grade3'+id).data('type');

        var grade_title,page_link;
        if(type === 'grade')
        {
            $('.grade').css('background-color','#fff');
            $('.grade2').css('background-color','#fff');
            $('.text-color-stage').css('color','#000000');
            $('#grade'+id).css('background-color','#14b1ab');
            $('#grade'+id).css('color','#000000');

            grade_title = $('#grade'+id).data('name');
            page_link = $('#grade'+id).data('page');
        }
        if(type1 === 'child')
        {
            $('.grade').css('background-color','#fff');
            $('.grade2').css('background-color','#fff');
            $('.text-color-stage').css('color','#000000');

            $('#grade2'+id).css('background-color','#14b1ab');
            $('#grade2'+id).css('color','#000000');
            grade_title = $('#grade2'+id).data('name');
            page_link = $('#grade2'+id).data('page');
        }
        if(type2 === 'grade1')
        {
            /*$('.drop-down__item .grade1').css('background-color','#fff');
            /!*$('.grade1').css('background-color','#fff');
            $('.grade3').css('background-color','#fff');*!/
            $('.text-center a').css('background-color','#fff');
            $('.text-center a').css('color','#E8505B');
            $('#gradeList1'+id).css('color','#fff');
            $('#gradeList1'+id).css('background-color','#E8505B');*/

            grade_title = $('#grade1'+id).data('name');
            page_link = $('#grade1'+id).data('page');
        }
        if(type3 === 'child1')
        {
            /*$('.grade1').css('background-color','#fff');
            $('.grade3').css('background-color','#fff');
            $('.text-center').css('background-color','#fff');
            $('.text-center').css('color','#E8505B');
            $('#gradeList3'+id).css('color','#fff');
            $('#gradeList3'+id).css('background-color','#E8505B');*/
            grade_title = $('#grade3'+id).data('name');
            page_link = $('#grade3'+id).data('page');
        }
        var e_card = 'site.eCards';
        var video_lessons = 'site.videoLessons';
        var file_materials = 'site.fileMaterials';
        var books = 'site.books';
        var ministry_exams = 'site.ministry-exam-forms';
        var all_cards = 'site.all-cards';
        if(page_link !== ministry_exams && page_link !== all_cards)
        {
            $('#showAllBtn').show();
            var a = document.getElementById('showAllBtn');
            a.href = window.location.origin+'/grade-subject/'+id;
        }
        var ul_name,ajax_url,title,grade_label;
        if(page_link === e_card)
        {
            ajax_url = 'getGradeEcardResource/'+id;
            ul_name = $('#gradeCards');
            title = $('#ecardTitle');
            grade_label = 'البطاقات التعليمية للصف';
        }
        else if(page_link === video_lessons)
        {
            ajax_url = 'getGradeVideoResource/'+id;
            ul_name = $('#gradeVideos');
            title = $('#videoTitle');
            grade_label = 'الدروس المصوّرة للصف';
        }
        else if(page_link === books)
        {
            ajax_url = 'getGradeBookResource/'+id;
            ul_name = $('#gradeBooks');
            title = $('#bookTitle');
            grade_label = 'الكتب الدراسية للصف';
        }
        else if(page_link === ministry_exams)
        {
            ajax_url= 'getGradeHighSchoolExams/'+id,
                ul_name = $('#gradeExams');
            title = $('#fileTitle');
            grade_label = 'نماذج الاختبارات الوزارية';
        }
        else if(page_link === all_cards)
        {
            ajax_url= 'getGradeHighSchoolCards/'+id,
                ul_name = $('#gradeCard');
            title = $('#fileTitle');
            grade_label = 'بطاقات التعلم الذاتي';
        }
        else if(page_link === file_materials)
        {
            title = $('#fileTitle');
            grade_label = 'المواد التعليمية للصف';
            $('#gradeMinistryFiles').empty();
            $('#gradeTeacherFiles').empty();
            $('#gradeMinistryFiles').html('<div class="d-flex justify-content-center mx-auto" id="loader1"></div>');

            $.ajax({
                url: 'getGradeMinistryFiles/'+id,
                type: 'GET',
                dataType: 'json',
                success: function (data)
                {
                    title.text(grade_label +' '+ grade_title)
                    $('#gradeMinistryFiles').empty();
                    $('#gradeMinistryFiles').html(data.html);
                }
            });
            $.ajax({
                url: 'getGradeTeacherFiles/'+id,
                type: 'GET',
                dataType: 'json',
                success: function (data)
                {
                    title.text(grade_label +' '+ grade_title)
                    $('#gradeTeacherFiles').empty();
                    $('#gradeTeacherFiles').html(data.html);
                }
            });
        }
        ul_name.html('<div class="d-flex justify-content-center mx-auto" id="loader1"></div>');
        $.ajax({
            url: ajax_url,
            type: 'GET',
            dataType: 'json',
            success: function (data)
            {
                title.text(grade_label +' '+ grade_title)
                ul_name.empty();
                ul_name.html(data.html);
            }
        });
    }
</script>
