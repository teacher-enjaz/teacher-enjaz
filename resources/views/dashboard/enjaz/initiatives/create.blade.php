<div class="modal fade add-initiative-eModal" id="add-initiative-eModal" tabindex="-1" aria-labelledby="add-initiative-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addInitiative')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="initiativesForm" name="initiativesForm" method="POST" action="{{route('initiatives.store')}}">
                @csrf
                <div class="modal-body p-3 m-5 mt-0" >
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-md-6 col-sm-12 mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="title" name="title">
                                    <label for="floatingInput" >{{__('enjaz.addInitiative')}}</label>
                                    <div class="text-danger" id="titleError"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12 mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="target_group" name="target_group">
                                    <label for="floatingInput" >{{__('enjaz.target_group')}}</label>
                                    <div class="text-danger" id="targetGroupError"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12 mt-3">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="team" name="team" rows="5"></textarea>
                                    <label for="floatingInput" >{{__('enjaz.teams')}}</label>
                                    <div class="text-danger" id="teamError"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12 mt-3">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                    <label for="floatingInput" >{{__('enjaz.initiativeDescription')}}</label>
                                    <div class="text-danger" id="descriptionError"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-sm-6">
                                <div class="form-floating mb-3 ">
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                    <label for="floatingInput" >{{__('enjaz.from')}}</label>
                                    <div class="text-danger" id="startDateError"></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                    <label for="floatingInput" >{{__('enjaz.to')}}</label>
                                    <div class="text-danger" id="endDateError"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating col-6 col-md-6 col-sm-6 mb-3">
                                <select class="form-select" id="classification_id" name="classification_id" aria-label="Floating label select example">
                                    <option label="{{__('enjaz.select')}}"></option>
                                    @if($classifications->count() > 0)
                                        @foreach($classifications as $classification)
                                            <option value="{{$classification->id}}">{{$classification->name}}</option>
                                        @endforeach
                                    @endif
                                    <option value="-1">{{__('enjaz.others')}}</option>
                                </select>
                                <label for="classification_id">{{__('enjaz.classification')}}</label>
                                <div class="text-danger" id="classificationIdError"></div>
                            </div>
                            <div class="form-floating col-6 col-md-6 col-sm-6 mb-3" id="classification_name" style="display: none">
                                    <input type="text" class="form-control" id="name" name="name">
                                    <label for="floatingInput" >{{__('enjaz.addClassification')}}</label>
                                    <div class="text-danger" id="nameError"></div>
                                </div>
                        </div>
                        <hr>
                        <h5 class="scetion-title" style="color: #14b1ab">{{__('enjaz.attachments')}}</h5>
                        <div class="row">
                            <div class="col-md-6" style="border-left:3px solid; border-left-color: #14b1ab">
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.addImage')}}</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-control my-1" type="file" name="new_image[]" id="new_image" multiple>
                                        <div class='text-danger' id="imageError"></div>
                                        <div class='text-danger' id="imageCountError"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h6 class="scetion-title">{{__('enjaz.addFile')}}</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-control my-1" type="file" name="new_file[]" id="new_file" multiple>
                                        <div class="text-danger" id="fileError"></div>
                                        <div class='text-danger' id="fileCountError"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="section-attachment d-flex justify-content-between">
                                        <h6 class="scetion-title">{{__('enjaz.addYoutube')}}</h6>
                                        <div class="d-flex justify-content-end files mb-2">
                                            <i class="add fas fa-plus-circle mx-2" id="add-youtube"></i>
                                            <i class="remove fas fa-minus-circle" id="remove-youtube"></i>
                                        </div>
                                    </div>
                                        <div class="row" id="youTubes">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div class="form-floating col-4 col-md-4 col-sm-4 justify-content-end" >
                        <div class="lang form-check">
                            <input class="form-check-input" name="allow_comments" type="checkbox" id="allow_comments" checked>
                            <label class="form-check-label mx-4" for="allow_comments">
                                {{__('enjaz.allowComments')}}
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn custom-btn draft-btn" name="saveDraft">{{__('enjaz.saveAsDraft')}}</button>
                    <button type="submit" class="btn custom-btn" name="publish">{{__('enjaz.publish')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
