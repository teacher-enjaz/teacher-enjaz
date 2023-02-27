
<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.skills')}}</h1>
</div>
@if($skills->count() > 0)
    <div class="skills mt-4">
        <div class="container">
            <div class="row">
                @foreach($skills as $skill)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <div class="skill-name">
                            <p>{{$skill->name}}</p>
                        </div>
                        <div class="skill-range">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="background-color: #E8505B;width: {{$skill->skill_level.'%'}}"
                                     aria-valuemin="0" aria-valuemax="100">
                                    {{$skill->skill_level.'%'}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
