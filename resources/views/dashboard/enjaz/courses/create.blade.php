<div class="modal fade" id="add-course-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addCoursesEnjazCpanel')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <div id="custom-alert" class="alert alert-danger" style="display: none;"></div>
                <form id="courseForm" name="" method="POST" action="{{route('courses.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.course')}}</label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="training_center">
                        <label for="floatingInput" >{{__('enjaz.organizationCourse')}}</label>
                        <div class="text-danger" id="organizationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="hours">
                        <label for="floatingInput" >{{__('enjaz.courseHourse')}}</label>
                        <div class="text-danger" id="hoursError"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3 ms-3">
                                <input type="date" class="form-control" id="" name="end_date">
                                <label for="floatingInput" >{{__('enjaz.trainingDate')}}</label>
                                <div class="text-danger" id="dateError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
