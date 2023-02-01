<div class="modal fade" id="edit-account-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editSocialAccount')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editSocialAccountForm" name="editSocialAccountForm" enctype="multipart/form-data" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="social_platforms_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($platforms->count() > 0)
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}" id="option{{$platform->id}}">
                                        {{$platform->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <label for="floatingSelect">{{__('enjaz.platformName')}}</label>
                        <div class="text-danger" id="editPlatformError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" >
                        <input type="text" class="form-control" id="link" name="link">
                        <label for="floatingInput" >{{__('enjaz.socialAccountLink')}}</label>
                        <div class="text-danger" id="editLinkError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="editBtn">{{__('enjaz.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
