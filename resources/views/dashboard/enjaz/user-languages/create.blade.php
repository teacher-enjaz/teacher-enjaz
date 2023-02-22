<div class="modal fade skill-modal" id="add-lang-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addLanguage')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="languageForm" name="languageForm" method="POST" action="{{route('user-languages.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="language_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($languages->count() > 0)
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">أخرى..</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.language')}}</label>
                        <div class="text-danger" id="languageError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="language_name" style="display: none">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.addLanguage')}}</label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <div class="lang form-check">
                            <input class="form-check-input" type="checkbox" value="0" id="flexCheckDefault" name="is_native">
                            <label class="form-check-label mx-4" for="flexCheckDefault">
                                {{__('enjaz.native')}}
                            </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 ms-3 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <label for="floatingInput" >{{__('enjaz.writing_level')}}</label>
                                <div class="d-flex justify-content-between">
                                    <span id="writing"></span>
                                    <span id="gradeWritingAdd">متوسط</span>
                                </div>
                                <div class="row">
                                    <input type="range" class="form-range mt-3 custom-range" value="50" id="customRange1" name="writing_level">
                                </div>

                                <label for="floatingInput" >{{__('enjaz.reading_level')}}</label>
                                <div class="d-flex justify-content-between">
                                    <span id="reading"></span>
                                    <span id = "gradeReadingAdd">متوسط</span>
                                </div>
                                <div class="row">
                                    <input type="range" class="form-range mt-3 custom-range" value="50" id="customRange2" name="reading_level">
                                </div>

                                <label for="floatingInput" >{{__('enjaz.speaking_level')}}</label>
                                <div class="d-flex justify-content-between">
                                    <span id="speaking"></span>
                                    <span id = "gradeSpeakingAdd">متوسط</span>
                                </div>
                                <div class="row">
                                    <input type="range" class="form-range mt-3 custom-range" value="50" id="customRange3" name="speaking_level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn"> {{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

