@extends('auth.layouts.loginLayout')

@section('content')
    <div class="container bk_all_page mb-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class=" ">
                    <div class="col-md-4 col-9 text-center mx-auto" style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px; position: relative; top: 0px;">
                        <h4 class="my-auto  size-18 py-2" >
                            <i class="fa fa-user-plus mx-2" ></i>{{ __('dashboard.createNewAccount') }}
                        </h4>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="size-11 px-1 text-danger">* {{__('dashboard.required')}}</div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <h5 for="firstName" class="col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.firstNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input name="first_name_ar" type="text" class=" "
                                       value="{{ old('first_name_ar') }}" autofocus>
                                @error('first_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="secondName" class=" col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.secondNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="second_name_ar" type="text" class=" " name="second_name_ar"
                                       value="{{ old('second_name_ar') }}">
                                @error('second_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="" class="col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.thirdNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="third_name_ar" type="text" class=" " name="third_name_ar"
                                       value="{{ old('third_name_ar') }}">
                                @error('third_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="" class=" col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.lastNameAR') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="last_name_ar" type="text" class=" " name="last_name_ar"
                                       value="{{ old('last_name_ar') }}">
                                @error('last_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <h5 for="firstName" class="col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.firstNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input name="first_name_en" type="text" class=" "
                                       value="{{ old('first_name_en') }}" autofocus>
                                @error('first_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="secondName" class=" col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.secondNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="second_name_en" type="text" class=" " name="second_name_en"
                                       value="{{ old('second_name_en') }}">
                                @error('second_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="" class="col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.thirdNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="third_name_en" type="text" class=" " name="third_name_en"
                                       value="{{ old('third_name_en') }}">
                                @error('third_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="" class=" col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.lastNameEN') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="last_name_en" type="text" class=" " name="last_name_en"
                                       value="{{ old('last_name_en') }}">
                                @error('last_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <h5 for="birth_date" class="col-form-label d-flex   text-gr size-16">{{ __('dashboard.birthDate') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="birth_date" type="date" class=" " name="birth_date"
                                       value="{{old('birth_date')}}">
                                @error('birth_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="identity_no" class="col-form-label d-flex   text-gr size-16">{{ __('dashboard.identityNo') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="identity_no" type="text" class="" name="identity_no" placeholder="{{__('dashboard.identityHint')}}" style="font-size: 12px;"
                                       value="{{ old('identity_no') }}">
                                @error('identity_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="mobile" class="col-form-label d-flex   text-gr size-16">{{ __('dashboard.mobile') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="mobile" type="text" class=" " name="mobile" placeholder="{{--{{ __('dashboard.mobileEx') }}--}}" style="font-size: 12px;"
                                       value="{{ old('mobile') }}">
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <h5 for="" class="col-form-label d-flex   text-gr size-16">{{ __('dashboard.gender') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="animated-radio-button">
                                            <label>
                                                <input type="radio" name="gender" value="1"
                                                    {{ old('gender') == 1 ? "checked" : "" }}>
                                                <span class="label-text">{{__('dashboard.male')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="animated-radio-button">
                                            <label>
                                                <input type="radio" name="gender" value="2"
                                                    {{ old('gender') == 2 ? "checked" : "" }}>
                                                <span class="label-text">{{__('dashboard.female')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h5 for="" class="col-form-label d-flex text-gr size-16">{{ __('dashboard.workPlace') }}<div class="size-11 px-1 text-danger">*</div></h5>
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
                            <div class="col-md-6">
                                <h5 for="directorate_id" class="col-form-label d-flex   text-gr size-16">{{ __('dashboard.directorates') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <select name="directorate_id" id="directorate_id" class="form-control shadow-none form-select pe-5" data-lang="{{app()->getLocale()}}">
                                </select>
                                @error('directorate_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <h5 for="email" class="col-form-label d-flex   text-gr size-16">{{ __('dashboard.email') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <h5 for="password" class="col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.password') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="password" type="password" class=" " name="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <h5 class="col-form-label text-md-right d-flex   text-gr size-16">{{ __('dashboard.confirmPassword') }}<div class="size-11 px-1 text-danger">*</div></h5>
                                <input id="password-confirm" type="password" class=" " name="password_confirmation">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mt-5 pb-4">
                            <div class="col-md-6 offset-md-4 mx-auto">
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
    <script type="text/javascript" src="{{asset('template/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/user.js')}}"></script>
@endsection
