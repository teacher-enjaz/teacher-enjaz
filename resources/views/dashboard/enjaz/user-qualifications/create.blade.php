<div class="modal fade" id="add-qualification-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="">{{__('enjaz.qualifications')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="userQualificationForm" name="userQualificationForm" method="POST" action="{{route('user-qualifications.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="qualification_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($qualifications->count() > 0)
                                @foreach($qualifications as $qualification)
                                    <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.qualification')}}</label>
                        <div class="text-danger" id="qualificationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="qualification_name" style="display: none">
                        <input type="text" class="form-control" id="" name="qualificationName">
                        <label for="floatingInput" >{{__('enjaz.addQualification')}}</label>
                        <div class="text-danger" id="qualificationNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="specialization_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($specializations->count() > 0)
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.specialization')}}</label>
                        <div class="text-danger" id="specializationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="specialization_name" style="display: none">
                        <input type="text" class="form-control" id="" name="specializationName">
                        <label for="floatingInput" >{{__('enjaz.addSpecialization')}}</label>
                        <div class="text-danger" id="specializationNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="university_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($universities->count() > 0)
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.university')}}</label>
                        <div class="text-danger" id="universityError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="university_name" style="display: none">
                        <input type="text" class="form-control" id="" name="universityName">
                        <label for="floatingInput" >{{__('enjaz.addUniversity')}}</label>
                        <div class="text-danger" id="universityNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="graduated_country_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($graduated_countries->count() > 0)
                                @foreach($graduated_countries as $graduated_country)
                                    <option value="{{$graduated_country->id}}">{{$graduated_country->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.graduated_country')}}</label>
                        <div class="text-danger" id="graduatedCountryError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="graduated_country_name" style="display: none">
                        <input type="text" class="form-control" id="" name="graduatedCountryName">
                        <label for="floatingInput" >{{__('enjaz.addGraduatedCountry')}}</label>
                        <div class="text-danger" id="graduatedCountryNameError"></div>
                    </div>

                    <div class="form-floating mb-3 ms-3">
                        <input type="number" class="form-control" name="graduation_year">
                        <label for="floatingInput" >{{__('enjaz.graduated_year')}}</label>
                        <div class="text-danger" id="graduatedYearError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
