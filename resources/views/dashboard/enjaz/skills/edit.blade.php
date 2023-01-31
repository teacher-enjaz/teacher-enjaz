<div class="modal fade skill-modal" id="edit-skill-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editSkill')}}    </h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editSkillForm" name="skillForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" value="">
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="name" name="name"  value="" >
                        <label for="floatingInput" > {{__('enjaz.skill')}} </label>
                        <div class="text-danger" id="editNameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <label for="floatingInput" >{{__('enjaz.skill_level')}}   </label>
                                <div class="d-flex justify-content-between">
                                    <span id="demo2"></span>
                                    <span id="grade-edit"></span>
                                </div>
                            </div>
                            <div class="row">
                                <input type="range" class="form-range mt-3 custom-range" name="skill_level" id="customRange2" value = "">
                                <div class="text-danger" id="editLevelError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="editBtn">{{__('enjaz.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
