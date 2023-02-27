<div class="modal fade edit-achievement-eModal" id="edit-achievement-eModal" tabindex="-1" aria-labelledby="edit-achievement-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editAchievement')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editAchievementForm" name="editAchievementForm" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-body p-3 m-5 mt-0" >
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-md-6 col-sm-12 mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="edit_title" name="title">
                                    <label for="floatingInput" >{{__('enjaz.addAchievement')}}</label>
                                    <div class="text-danger" id="editTitleError"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12 mt-3">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="edit_description" name="description" rows="5"></textarea>
                                    <label for="floatingInput" >{{__('enjaz.achievementDescription')}}</label>
                                    <div class="text-danger" id="editDescriptionError"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-sm-6">
                                <div class="form-floating mb-3 ">
                                    <input type="date" class="form-control" id="edit_start_date" name="start_date">
                                    <label for="floatingInput" >{{__('enjaz.from')}}</label>
                                    <div class="text-danger" id="editStartDateError"></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="edit_end_date" name="end_date">
                                    <label for="floatingInput" >{{__('enjaz.to')}}</label>
                                    <div class="text-danger" id="editEndDateError"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating col-6 col-md-6 col-sm-6 mb-3">
                                <select class="form-select" id="edit_classification_id" name="classification_id" aria-label="Floating label select example">
                                    <option label="{{__('enjaz.select')}}"></option>
                                    @if($classifications->count() > 0)
                                        @foreach($classifications as $classification)
                                            <option value="{{$classification->id}}" id="option{{$classification->id}}">{{$classification->name}}</option>
                                        @endforeach
                                    @endif
                                    <option value="-1">{{__('enjaz.others')}}</option>
                                </select>
                                <label for="classification_id">{{__('enjaz.classification')}}</label>
                                <div class="text-danger" id="editClassificationIdError"></div>
                            </div>
                            <div class="form-floating col-6 col-md-6 col-sm-6 mb-3" id="edit_classification_name" style="display: none">
                                <input type="text" class="form-control" id="edit_name" name="name">
                                <label for="floatingInput" >{{__('enjaz.addClassification')}}</label>
                                <div class="text-danger" id="editNameError"></div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="scetion-title" style="color: #14b1ab">المرفقات</h5>
                        {{--old code for using dynamic inputs--}}
                        {{--<div class="row">
                            <div class="col-md-6">
                                <div class="row" style="border-left:3px solid; border-left-color: #14b1ab">
                                    <div class="col-12">
                                        <div class="section-attachment">
                                            <div class="row">
                                                <div class="col-6 mt-1">
                                                    <h6 class="scetion-title">{{__('enjaz.addImage')}}</h6>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-end files mb-2">
                                                        <i class="add fas fa-plus-circle mx-2" id="add-image"></i>
                                                        <i class="remove fas fa-minus-circle" id="remove-image"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="images">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-left:3px solid; border-left-color: #14b1ab">
                                    <div class="section-attachment ">
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <h6 class="scetion-title">{{__('enjaz.addFile')}}</h6>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-end files mb-2">
                                                    <i class="add fas fa-plus-circle mx-2" id="add-file"></i>
                                                    <i class="remove fas fa-minus-circle" id="remove-file"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="files" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="section-attachment ">
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <h6 class="scetion-title">{{__('enjaz.addYoutube')}}</h6>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-end files mb-2">
                                                    <i class="add fas fa-plus-circle mx-2" id="add-youtube"></i>
                                                    <i class="remove fas fa-minus-circle" id="remove-youtube"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="youTubes">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                        <div class="row">
                            <div class="col-md-6" style="border-left:3px solid; border-left-color: #14b1ab">
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.prevImage')}}</h6>
                                </div>
                                <div class="row d-flex" id="prev_images">
                                </div>
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.addImage')}}</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-control my-1" accept=".jpg,.gif,.png,.jpeg,.svg,.webp" type="file" name="new_image[]" id="edit_new_image" multiple>
                                        <div class='text-danger' id="editImageError"></div>
                                        <div class='text-danger' id="editImageCountError"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.prevFile')}}</h6>
                                </div>
                                <div class="row" id="prev_files">

                                </div>
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.addFile')}}</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-control my-1" accept=".doc,.docx,.xls,.ppt,.pptx" type="file" name="new_file[]" id="edit_new_file" multiple>
                                        <div class="text-danger" id="editFileError"></div>
                                        <div class='text-danger' id="editFileCountError"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.prevYoutube')}}</h6>
                                </div>
                                <div class="row" id="prev_youTubes">
                                </div>
                                <div class="row">
                                    <div class="section-attachment d-flex justify-content-between">
                                        <h6 class="scetion-title">{{__('enjaz.addYoutube')}}</h6>
                                        <div class="d-flex justify-content-end files mb-2">
                                            <i class="add fas fa-plus-circle mx-2" id="add-new-youtube"></i>
                                            <i class="remove fas fa-minus-circle" id="remove-new-youtube"></i>
                                        </div>
                                    </div>
                                    <div class="row" id="editYouTubes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div class="form-floating col-4 col-md-4 col-sm-4 justify-content-end" >
                        <div class="lang form-check">
                            <input class="form-check-input" name="allow_comments" type="checkbox" id="allow_comments" checked>
                            <label class="form-check-label mx-4" for="allow_comments">
                                {{__('enjaz.allowComments')}}
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn custom-btn draft-btn" name="saveDraft">{{__('enjaz.saveAsDraft')}}</button>
                        <button type="submit" class="btn custom-btn" name="publish">{{__('enjaz.publish')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

</script>
