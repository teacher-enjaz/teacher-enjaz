<div class="modal fade add-initiative-eModal" id="edit-award-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editCompetitionsModal')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editAwardForm" name="editAwardForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="award_id" id="award_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($awards->count() > 0)
                                @foreach($awards as $award)
                                    <option value="{{$award->id}}" id="option{{$award->id}}">{{$award->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.award')}}</label>
                        <div class="text-danger" id="editAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="award_name" style="display: none">
                        <input type="text" class="form-control" name ="name" id="name">
                        <label for="floatingInput" >{{__('enjaz.awardName')}}</label>
                        <div class="text-danger" id="editNameAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="award_donor" style="display: none">
                        <input type="text" class="form-control" name="donor" id="donor">
                        <label for="floatingInput" >{{__('enjaz.awardDonor')}}</label>
                        <div class="text-danger" id="editDonorAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="award_description" style="display: none">
                        <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                        <label for="floatingInput" >{{__('enjaz.awardDescription')}}</label>
                        <div class="text-danger" id="editDescriptionAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="date" class="form-control" name="obtained_date" id="obtained_date">
                        <label for="floatingInput" >{{__('enjaz.grantDate')}}</label>
                        <div class="text-danger" id="editObtainedDateError"></div>
                    </div>
                    <div class="row attachments mb-3">
                        <div class="col-12">
                            <label for="file-input">{{__('enjaz.uploadImage')}}</label>
                            <input  type="file" class="form-control" name="image" id="image"/>
                            <img src="" width="50px" height="50px" id="image_view" alt="">
                        </div>
                        <div class="col-12">
                            <div class="section-attachment ">
                                <h6 class="scetion-title">{{__('enjaz.addyoutubeLink')}}</h6>
                                <div class="form-floating mb-3 ms-3">
                                    <input type="text" class="form-control"  name="youtube_link" id="youtube_link">
                                    <label for="floatingInput" >{{__('enjaz.youtubeLink')}}</label>
                                    <div class="text-danger" id="editYoutubeLinkError"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn draft-btn" id="draftBtn">{{__('enjaz.saveAsDraft')}}</button>
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.publish')}} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
