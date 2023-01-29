<div class="modal fade" id="edit-qualification-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="">{{__('enjaz.qualifications')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editUserQualificationForm" name="editUserQualificationForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="qualification_id" id="qualification_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($qualifications->count() > 0)
                                @foreach($qualifications as $qualification)
                                    <option value="{{$qualification->id}}" id="option1{{$qualification->id}}">
                                        {{$qualification->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.qualification')}}</label>
                        <div class="text-danger" id="editQualificationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="edit_qualification_name" style="display: none">
                        <input type="text" class="form-control" id="" name="qualificationName">
                        <label for="floatingInput" >{{__('enjaz.addQualification')}}</label>
                        <div class="text-danger" id="editQualificationNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="specialization_id" id="specialization_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($specializations->count() > 0)
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}" id="option2{{$specialization->id}}">
                                        {{$specialization->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.specialization')}}</label>
                        <div class="text-danger" id="editSpecializationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="edit_specialization_name" style="display: none">
                        <input type="text" class="form-control" id="" name="specializationName">
                        <label for="floatingInput" >{{__('enjaz.addSpecialization')}}</label>
                        <div class="text-danger" id="editSpecializationNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="university_id" id="university_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($universities->count() > 0)
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}" id="option3{{$university->id}}">
                                        {{$university->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>

                        </select>
                        <label for="floatingSelect">{{__('enjaz.university')}}</label>
                        <div class="text-danger" id="editUniversityError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="edit_university_name" style="display: none">
                        <input type="text" class="form-control" id="" name="universityName">
                        <label for="floatingInput" >{{__('enjaz.addUniversity')}}</label>
                        <div class="text-danger" id="editUniversityNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="graduated_country_id" id="graduated_country_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($graduated_countries->count() > 0)
                                @foreach($graduated_countries as $graduated_country)
                                    <option value="{{$graduated_country->id}}" id="option4{{$graduated_country->id}}">
                                        {{$graduated_country->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.graduated_country')}}</label>
                        <div class="text-danger" id="editGraduatedCountryError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="edit_graduated_country_name" style="display: none">
                        <input type="text" class="form-control" id="" name="graduatedCountryName">
                        <label for="floatingInput" >{{__('enjaz.addGraduatedCountry')}}</label>
                        <div class="text-danger" id="editGraduatedCountryNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <input type="number" class="form-control" name="graduation_year" id="edit_graduation_year">
                        <div class="text-danger" id="editGraduatedYearError"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="editBtn">{{__('enjaz.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
