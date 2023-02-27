    <div class="section-title mb-2 ">
        <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.qualifications')}}</h1>
        {{$qualifications->count()}}
    </div>
@if($qualifications->count() > 0)
    <div class="card-body">
        <div class="timeline-box">
            <div class="timeline">
                @foreach($qualifications as $qualification)
                    <div class="timeline-item">
                        <div class="circle-dot"></div>
                        <h5 class="timeline-text">
                            {{$qualification->qualification->name}}
                        </h5>
                        <h5 class="timeline-date timeline-text">
                            <i class="fas fa-calendar-week"></i> {{$qualification->graduation_year}}
                        </h5>
                        <h4 class="small font-weight-bold timeline-text">{{$qualification->qualification->name}}</h4>
                        <h4 class="small font-weight-bold timeline-text">{{$qualification->specialization->name}}</h4>
                        <h4 class="small font-weight-bold timeline-text">{{$qualification->graduated_country->name}}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

