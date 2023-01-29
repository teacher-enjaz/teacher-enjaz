<div class="modal fade" id="add-member-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addMembership')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="membershipForm" name="membershipForm" method="POST" action="{{route('memberships.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="floatingInput" name="name">
                        <label for="floatingInput" >{{__('enjaz.membershipName')}}</label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="organization_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($organizations->count() > 0)
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.organization')}}</label>
                        <div class="text-danger" id="organizationError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="organization_name" style="display: none">
                        <input type="text" class="form-control" id="" name="organization_name">
                        <label for="floatingInput" >{{__('enjaz.addOrganization')}}</label>
                        <div class="text-danger" id="organizationNameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="date" class="form-control" name="grant_date">
                        <label for="floatingInput" >{{__('enjaz.grantDate')}}</label>
                        <div class="text-danger" id="grantDateError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="validity">
                            <option label="{{__('enjaz.select')}}"></option>
                            <option value="{{__('enjaz.valid')}}">{{__('enjaz.valid')}}</option>
                            <option value="{{__('enjaz.expired')}}">{{__('enjaz.expired')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.validity')}}</label>
                        <div class="text-danger" id="validityError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
