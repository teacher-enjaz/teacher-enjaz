<div class="modal fade" id="add-content-types-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addContentTypes')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <div id="custom-alert" class="alert alert-danger" style="display: none;"></div>
                <form id="contentTypeForm" name="contentTypeForm" method="POST" action="{{route('content-types.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" name="name">
                        <label for="floatingInput" >{{__('enjaz.contentType')}}</label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
