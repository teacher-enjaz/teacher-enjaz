<div class="modal fade add-initiative-eModal" id="add-award-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addCompetitionsModal')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 m-5 mt-0" >
                <form id="awardForm" name="awardForm" method="POST" action="{{route('user-awards.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select selectpicker"
                                aria-label="Floating label select example"
                                data-live-search="true"  name="award_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($awards->count() > 0)
                                @foreach($awards as $award)
                                    <option value="{{$award->id}}">{{$award->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.award')}}</label>
                        <div class="text-danger" id="awardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="award_name" style="display: none">
                        <input type="text" class="form-control" name="name">
                        <label for="floatingInput" >{{__('enjaz.awardName')}}</label>
                        <div class="text-danger" id="nameAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="award_donor"  style="display: none">
                        <input type="text" class="form-control" name="donor">
                        <label for="floatingInput" >{{__('enjaz.awardDonor')}}</label>
                        <div class="text-danger" id="donorAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="award_description" style="display: none">
                        <textarea class="form-control" id="floatingInput" rows="5" name="description"></textarea>
                        <label for="floatingInput" >{{__('enjaz.awardDescription')}}</label>
                        <div class="text-danger" id="descriptionAwardError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="date" class="form-control" name="obtained_date"/>
                        <label for="floatingInput" >{{__('enjaz.obtainedDate')}}</label>
                        <div class="text-danger" id="obtainedDateError"></div>
                    </div>
                    <div class="row attachments mb-3">
                        <div class="co-12">
                            <div class="section-attachment ">
                                <h5 class="scetion-title">{{__('enjaz.addImage')}}</h5>
                                <div class="image-upload attachment-button">
                                    <label for="file-input">{{__('enjaz.uploadImage')}}</label>
                                    <input id="file-input" type="file" name="image"/>
                                </div>
                                <div class="text-danger" id="imageError"></div>
                            </div>
                        </div>
                        <div class="co-12">
                            <div class="section-attachment ">
                                <h6 class="scetion-title">{{__('enjaz.addYoutubeLink')}}</h6>
                                <div class="form-floating mb-3 ms-3">
                                    <input type="text" class="form-control" id="floatingInput" name="youtube_link">
                                    <label for="floatingInput" >{{__('enjaz.youtubeLink')}}</label>
                                    <div class="text-danger" id="youtubeLinkError"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn draft-btn" id="draftBtn" name="saveDraft">{{__('enjaz.saveAsDraft')}}</button>
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.publish')}} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
