<div class="modal fade" id="edit-platform-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editMembership')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editSocialPlatformForm" name="editSocialPlatformForm" enctype="multipart/form-data" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="name" name="name" value="">
                        <label for="floatingInput" >{{__('enjaz.platformName')}}</label>
                        <div class="text-danger" id="editNameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" >
                        <input type="file" class="form-control" id="image" name="image">
                        <label for="floatingInput" >{{__('enjaz.platformImage')}}</label>
                        <img src="" id="image-platform" width="100px" height="100px">
                        <div class="text-danger" id="editImageError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="editBtn">{{__('enjaz.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
