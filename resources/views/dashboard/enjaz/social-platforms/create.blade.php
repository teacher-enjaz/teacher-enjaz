<div class="modal fade" id="add-platforms-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addPlatformsEnjazCpanel')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <div id="custom-alert" class="alert alert-danger" style="display: none;"></div>
                <form id="platformForm" name="" method="POST" enctype="multipart/form-data" action="{{route('social-platforms.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.platformName')}}</label>
                        <div class="text-danger" id="namePlatformError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="file" class="form-control" id="" name="image">
                        <label for="floatingInput" >{{__('enjaz.platformImage')}}</label>
                        <div class="text-danger" id="imagePlatformError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
