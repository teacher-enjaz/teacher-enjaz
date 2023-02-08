<div class="modal fade skill-modal" id="edit-lang-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editLanguage')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editLanguageForm" name="languageForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" value="">
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="language_id" id="language_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($languages->count() > 0)
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}" id="option{{$language->id}}">
                                        {{$language->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <label for="floatingSelect">{{__('enjaz.language')}}</label>
                        <div class="text-danger" id="editLanguageError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <div class="lang form-check">

                            <input class="form-check-input" type="checkbox" value="" name="is_native" id="is_native">
                            <label class="form-check-label mx-4" for="flexCheckDefault">
                                {{__('enjaz.native')}}
                            </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 ms-3 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="row">
                                    <label for="floatingInput" > {{__('enjaz.writing_level')}}   </label>
                                    <div class="d-flex justify-content-between">
                                        <span id="writing02"></span>
                                        <span id="gradeWritingEdit"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <input type="range" class="form-range mt-3 custom-range" id="customRange02" value ="" name="writing_level">
                                </div>

                                <div class="row">
                                    <label for="floatingInput" >{{__('enjaz.reading_level')}}</label>
                                    <div class="d-flex justify-content-between">
                                        <span id="reading03"></span>
                                        <span id = "gradeReadingEdit"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <input type="range" class="form-range mt-3 custom-range" id="customRange03" value ="" name="reading_level">
                                </div>
                                <div class="row">
                                    <label for="floatingInput" >{{__('enjaz.speaking_level')}}</label>
                                    <div class="d-flex justify-content-between">
                                        <span id="speaking04"></span>
                                        <span id = "gradeSpeakingEdit"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="range" class="form-range mt-3 custom-range" id="customRange04" value ="" name="speaking_level">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="editBtn"> {{__('enjaz.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
