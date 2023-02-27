
<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.user-languages')}}</h1>
</div>
@if($user_languages->count() > 0)
    <div class="skills mt-4">
        <div class="container">
            <div class="row">
                @foreach($user_languages as $user_language)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <div class="skill-name ">
                            <p>{{$user_language->language->name}}<sub>{{$user_language->is_native == 1 ? __('enjaz.native') : __('enjaz.non-native')}}</sub></p>
                        </div>
                        <div class="skill-range">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="background-color: #ffc107;width: {{round(\PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages::average($user_language->reading_level,$user_language->writing_level,$user_language->speaking_level),0).'%'}}"
                                     aria-valuemin="0" aria-valuemax="100">
                                    {{round(\PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages::average($user_language->reading_level,$user_language->writing_level,$user_language->speaking_level),0).'%'}}
                                </div>
                            </div>
{{--                            <div class="skill-stars">--}}
{{--                                <span class="fa fa-star checked"></span>--}}
{{--                                <span class="fa fa-star checked"></span>--}}
{{--                                <span class="fa fa-star checked"></span>--}}
{{--                                <span class="fa fa-star checked"></span>--}}
{{--                                <span class="fa fa-star"></span>--}}
{{--                            </div>--}}
{{--                            <div class="skill-num mx-4">--}}
{{--                                {{round(\PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages::average($user_language->reading_level,$user_language->writing_level,$user_language->speaking_level),0).'%'}}--}}
{{--                            </div>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
