
<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.experiences')}}</h1>
</div>
@if($experiences->count() > 0)
    <div class="card-body ">
        <div class="timeline-box experinces">
            <div class="timeline">
                @foreach($experiences as $experience)
                    <div class="timeline-item">
                        <div class="circle-dot d-flex justify-content-center">
                            <i class="fa fa-book-open-reader"></i>
                        </div>
                        <div class="experince-body">
                            <h4 class=" experince-title">
                                {{$experience->job->name}}
                                <sub>
                                    {{$experience->from}} - {{$experience->is_present == 0 ? $experience->to : __('enjaz.now')}}
                                </sub>
                            </h4>
                            <h4 class="small font-weight-bold timeline-text">{{$experience->organization}}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
