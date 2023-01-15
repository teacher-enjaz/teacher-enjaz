@extends('auth.layouts.loginLayout')

@section('content')
    <div class="container bk_all_page mb-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="">
                    <div class="col-md-4 col-9 text-center mx-auto" style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: 0px;">
                        <h4 class="my-auto  size-18 py-2" >
                            <i class="fa fa-user-plus mx-2" ></i>{{ __('dashboard.createNewAccount') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.teacherSupervisorRegister') }}">
                            @csrf
                            <div class="size-11 px-1 text-danger">* {{__('dashboard.required')}}</div>
                            <div class="form-group row">
                                <div class="col-md-3 ">
                                    <h5 for="firstName" class="col-form-label d-flex text-md-right">{{ __('dashboard.firstNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input name="first_name_ar" type="text" class="form-control"
                                           value="{{ old('first_name_ar') }}" autofocus>
                                    @error('first_name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <h5 class=" col-form-label  d-flex text-md-right">{{ __('dashboard.secondNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="second_name_ar" type="text" class="form-control" name="second_name_ar"
                                           value="{{ old('second_name_ar') }}">
                                    @error('second_name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <h5 for="" class="col-form-label d-flex text-md-right">{{ __('dashboard.thirdNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="third_name_ar" type="text" class="form-control" name="third_name_ar"
                                           value="{{ old('third_name_ar') }}">
                                    @error('third_name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <h5 for="" class=" col-form-label d-flex text-md-right">{{ __('dashboard.lastNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="last_name_ar" type="text" class="form-control" name="last_name_ar"
                                           value="{{ old('last_name_ar') }}">
                                    @error('last_name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <h5 for="firstName" class="col-form-label d-flex text-md-right">{{ __('dashboard.firstNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input name="first_name_en" type="text" class="form-control"
                                           value="{{ old('first_name_en') }}" autofocus>
                                    @error('first_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <h5 for="secondName" class=" col-form-label d-flex text-md-right">{{ __('dashboard.secondNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="second_name_en" type="text" class="form-control" name="second_name_en"
                                           value="{{ old('second_name_en') }}">
                                    @error('second_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <h5 for="" class="col-form-label d-flex text-md-right">{{ __('dashboard.thirdNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="third_name_en" type="text" class="form-control" name="third_name_en"
                                           value="{{ old('third_name_en') }}">
                                    @error('third_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <h5 for="" class=" col-form-label d-flex text-md-right">{{ __('dashboard.lastNameEN') }}<div class="size-11  text-danger">*</div></h5>
                                    <input id="last_name_en" type="text" class="form-control" name="last_name_en"
                                           value="{{ old('last_name_en') }}">
                                    @error('last_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <h5 for="birth_date" class="col-form-label d-flex">{{ __('dashboard.birthDate') }}<div class="size-11  text-danger">*</div></h5>
                                    <input id="birth_date" type="date" class="form-control" name="birth_date"
                                           value="{{ $user->birth_date != null ? $user->birth_date : '' }}" >
                                    @error('birth_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5 for="identity_no" class="col-form-label d-flex">{{ __('dashboard.identityNo') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="identity_no" type="text" class="form-control" name="identity_no" placeholder="{{__('dashboard.identityHint')}}"
                                           value="{{ $user->identity_no != null ? $user->identity_no : '' }}">
                                    @error('identity_no')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5 for="mobile" class="col-form-label d-flex">{{ __('dashboard.mobile') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="mobile" type="text" class="" name="mobile"
                                           value="{{$user->mobile}}">
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <h5 for="" class="col-form-label d-flex">{{ __('dashboard.gender') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="animated-radio-button">
                                                <label>
                                                    <input type="radio" name="gender" value="1"
                                                        {{ $user->gender == 'ذكر' ? "checked" : "" }}>
                                                    <span class="label-text">{{__('dashboard.male')}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="animated-radio-button">
                                                <label>
                                                    <input type="radio" name="gender" value="2"
                                                        {{ $user->gender == 'أنثى' ? "checked" : "" }}>
                                                    <span class="label-text">{{__('dashboard.female')}}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5 for="" class="col-form-label d-flex">{{ __('dashboard.workPlace') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <select name="geoPlace_id" id="geoPlace_id" class="form-control shadow-none form-select pe-5" data-lang="{{app()->getLocale()}}">
                                        <option value="">{{__('dashboard.selectWorkPlace')}}</option>
                                        @if($geoPlaces->count()>0)
                                            @foreach($geoPlaces as $geoPlace)
                                                <option value="{{$geoPlace->id}}"
                                                    {{$geoPlace->id == old('geoPlace_id') ? 'selected':''}}>
                                                    {{app()->getLocale() == 'ar' ? $geoPlace->name_ar : $geoPlace->name_en}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('geoPlace_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5 for="directorate_id" class="col-form-label d-flex">{{ __('dashboard.directorates') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <select name="directorate_id" id="directorate_id" class="form-control shadow-none form-select pe-5" data-lang="{{app()->getLocale()}}">
                                    </select>
                                    @error('directorate_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{--/****** choose User Type ********/--}}
{{--
                            <h5 class="col-form-label text-md-right d-flex">{{ __('dashboard.userType') }}<div class="size-11 px-1 text-danger">*</div></h5>
--}}
                            {{--<div class="row">
                                <div class="col-md-3">
                                    <div class="animated-radio-button">
                                        <label>
                                            <input type="radio" name="userType" value="1"
                                                {{ old('userType') == 1 ? "checked" : "" }}>
                                            <span class="label-text">{{__('dashboard.supervisor')}}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="animated-radio-button">
                                        <label>
                                            <input type="radio" name="userType" value="2"
                                                {{ old('userType') == 2 ? "checked" : "" }}>
                                            <span class="label-text">{{__('dashboard.teacher')}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('userType')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror--}}

                            {{--/****** Supervisor data ********/--}}
                            @if($user->job == 'مشرف تربوي')
                                <div class="row" id="supervisor" {{--style="display: none"--}}>
                                    <h6 class="col-form-label text-md-right d-flex pr-3 pb-3">{{ __('dashboard.supervisorHint') }}<div class="size-11 px-1 text-danger">*</div></h6>
                                    <div class="col-md-12">
                                        <div class="groups py-2">
                                            <div class=" d-flex justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                        <label class="control-label">{{__('dashboard.levels')}}</label>
                                                        @if($levels->count() >0)
                                                            <select name="levels[]" class="form-control levels" id="levels" multiple="" style="width:100%">
                                                                @foreach($levels as $level)
                                                                    <option value="{{$level->id}}"
                                                                        {{ old('levels') == $level->id ? "selected" : "" }}>
                                                                        {{app()->getLocale() == 'ar' ? $level->name_ar : $level->name_en}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('levels')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{__('dashboard.selectMainGrade')}}
                                                        </label>
                                                        @if($grades->count() > 0)
                                                            <select name="grades[]" class="form-control grades" id="grades" multiple="" style="width:100%">
                                                                <optgroup label="{{__('dashboard.selectMainGrade')}} "></optgroup>
                                                                {{subRecursionForObject($grades, 0, '-')}}
                                                            </select>
                                                        @endif
                                                        @error('grades')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label> {{__('dashboard.subjects')}}
                                                                </label>
                                                                @if($subjects->count() > 0)
                                                                    <select name="subjects[]" class="form-control subjects" id="subjects" multiple="" style="width:100%">
                                                                        {{subRecursion($subjects, 0, '-')}}
                                                                    </select>
                                                                @endif
                                                                @error('subjects')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{--/****** teacher data ********/--}}
                            @if($user->job == 'معلم')
                                <div class="row" id="teacher" >
                                    <h6 class="col-form-label text-md-right d-flex pr-3 pb-3">{{ __('dashboard.teacherHint') }}<div class="size-11 px-1 text-danger">*</div></h6>
                                    <div class="col-md-12">
                                        <div class="groups py-2 ">
                                            <div class=" d-flex justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <label for="school_id" class="control-label">{{ __('dashboard.schoolName') }}</label>
                                                                <select name="school_id" id="school_id" class="form-control" style="width: 100%">
                                                                </select>
                                                                @error('school_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <label class="control-label">{{__('dashboard.levels')}}</label>
                                                                @if($levels->count() >0)
                                                                    <select name="levels[]" class="form-control levels" id="levels1" multiple="" style="width:100%">
                                                                        @foreach($levels as $level)
                                                                            <option value="{{$level->id}}"
                                                                                {{ old('levels') == $level->id ? "selected" : "" }}>
                                                                                {{app()->getLocale() == 'ar' ? $level->name_ar : $level->name_en}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('levels')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label> {{__('dashboard.selectMainGrade')}}
                                                                </label>
                                                                @if($grades->count() > 0)
                                                                    <select name="grades[]" class="form-control grades  shadow-none form-select pe-5" id="grades1" multiple="" style="width:100%">
                                                                        <optgroup label="{{__('dashboard.selectMainGrade')}} "></optgroup>
                                                                        {{subRecursionForObject($grades, 0, '-')}}
                                                                    </select>
                                                                @endif
                                                                @error('grades')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label> {{__('dashboard.subjects')}}
                                                                </label>
                                                                @if($subjects->count() > 0)
                                                                    <select name="subjects[]" class="form-control subjects shadow-none form-select pe-5" id="subjects1" multiple="" style="width:100%">
                                                                        {{subRecursion($subjects, 0, '-')}}
                                                                    </select>
                                                                @endif
                                                                @error('subjects')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <h5 for="email" class="col-form-label d-flex">{{ __('dashboard.email') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="email" type="email" class="form-control" name="email" value="{{old('email') }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5 for="password" class="col-form-label text-md-right d-flex">{{ __('dashboard.password') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="password" type="password" class="form-control" name="password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <h5 class="col-form-label text-md-right d-flex">{{ __('dashboard.confirmPassword') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <div class="col-md-6 offset-md-4  mx-auto">
                                    <button type="submit" class="btn btn_login rounded-pill align-self-center justify-content-center mx-auto d-flex" style="line-height: 32px;">
                                        {{ __('dashboard.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/user.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/plugins/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#levels').select2();
            $('#levels1').select2();
            $('#grades').select2();
            $('#grades1').select2();
            $('#subjects').select2();
            $('#subjects1').select2();
            $('#supervisor_directorate').select2();
        });
    </script>
@endsection
