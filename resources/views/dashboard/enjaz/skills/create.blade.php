<div class="modal fade skill-modal" id="add-skill-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addSkill')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="skillForm" name="skillForm" method="POST" action="{{route('skills.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="floatingInput" name="name">
                        <label for="floatingInput" > {{__('enjaz.skill')}} </label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <label for="floatingInput" >{{__('enjaz.skill_level')}}</label>
                                <div class="d-flex justify-content-between">
                                    <span id="demo"></span>
                                    <span id="grade">متوسط</span>
                                </div>
                            </div>
                            <div class="row">
                                <input type="range" class="form-range mt-3 custom-range" id="customRange1" name="skill_level">
                                <div class="text-danger" id="skillLevelError"></div>
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

