
<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.courses')}}</h1>
</div>
@if($courses->count() > 0)
    <div class="courses">
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <i class="fa fa-cube"></i>
                        <div class="course-card">
                            <p>{{$course->name}}</p>
                            <p>{{$course->training_center}}</p>
                            <p>{{$course->hours}} ساعة </p>
                            <p>{{$course->end_date}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
