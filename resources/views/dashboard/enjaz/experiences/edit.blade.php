<div class="modal fade" id="edit-experience-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editExperience')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editExperienceForm" name="experienceForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="job_id" id="job_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($jobs->count() > 0)
                                @foreach($jobs as $job)
                                    <option value="{{$job->id}}" id="option{{$job->id}}">
                                        {{$job->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.addJob')}}</label>
                        <div class="text-danger" id="editJobError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="edit_job_name" style="display: none">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.addOrganization')}}</label>
                        <div class="text-danger" id="editJobNameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="organization" name="organization" value="">
                        <label for="floatingInput" >{{__('enjaz.organization')}}</label>
                        <div class="text-danger" id="editOrganizationError"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3 ms-3">
                                <input type="date" class="form-control" id="from" name="from" value="">
                                <label for="floatingInput" >{{__('enjaz.from')}}</label>
                                <div class="text-danger" id="editFromError"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3 ms-3">
                                <input type="date" class="form-control" id="to" name="to" value="">
                                <label for="floatingInput" >{{__('enjaz.to')}}</label>
                                <div class="text-danger" id="editToError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="notes" name="notes">
                        <label for="floatingInput" >{{__('enjaz.notes')}}</label>
                        <div class="text-danger" id="editNoteError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="editBtn">{{__('enjaz.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

