<div class="modal fade" id="add-experience-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addExperience')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="experienceForm" name="experienceForm" method="POST" action="{{route('experiences.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="job_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($jobs->count() > 0)
                                @foreach($jobs as $job)
                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.job')}}</label>
                        <div class="text-danger" id="jobError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="job_name" style="display: none">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.addJob')}}</label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="organization">
                        <label for="floatingInput" >{{__('enjaz.organization')}}</label>
                        <div class="text-danger" id="organizationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <div class="lang form-check">
                            <input class="form-check-input" type="checkbox" id="is_present" name="is_present">
                            <label class="form-check-label mx-4" for="flexCheckDefault">
                                مازلت أعمل في هذه الوظيفة
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3 ms-3">
                                <input type="date" class="form-control" name="from">
                                <label for="floatingInput" >{{__('enjaz.from')}}</label>
                                <div class="text-danger" id="fromError"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3 ms-3" id="to_div">
                                <input type="date" class="form-control" name="to">
                                <label for="floatingInput" >{{__('enjaz.to')}}</label>
                                <div class="text-danger" id="toError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="notes">
                        <label for="floatingInput" >{{__('enjaz.notes')}}</label>
                        <div class="text-danger" id="noteError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
