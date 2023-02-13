<div class="modal fade edit-article-eModal arrticles-modal" id="edit-article-eModal" tabindex="-1" aria-labelledby="edit-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.editArticle')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <form id="editArticleForm" name="editArticleForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="sumNote" id="sumNote" value="">
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="title" name="title">
                        <label for="floatingInput" >{{__('enjaz.articleTitle')}}</label>
                        <div class="text-danger" id="editTitleError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" id="classification_id" name="classification_id" aria-label="Floating label select example">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($classifications->count() > 0)
                                @foreach($classifications as $classification)
                                    <option value="{{$classification->id}}"  id="option{{$classification->id}}">{{$classification->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.classification')}}</label>
                        <div class="text-danger" id="editClassificationIdError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="edit_classification_name" style="display: none">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.addClassification')}}</label>
                        <div class="text-danger" id="editNameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <textarea class="form-control articel-text details"  rows="5" id="edit-summernote" name="details"></textarea>
                        <div class="text-danger" id="editDetailsError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <div class="lang form-check">
                            <input class="form-check-input" name="allow_comments" type="checkbox" value="1" id="allow_comments" checked>
                            <label class="form-check-label mx-4" for="flexCheckDefault">
                                {{__('enjaz.allowComments')}}
                            </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="file" class="form-control" id="image" name="image">
                        <label for="floatingInput" >{{__('enjaz.addImage')}}</label>
                        <img src="" id="image-article" width="100px" height="100px">
                        <div class="text-danger" id="editImageArticleError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn draft-btn" name="editSaveDraft">{{__('enjaz.saveAsDraft')}}</button>
                        <button type="submit" class="btn custom-btn" name="editPublish">{{__('enjaz.publish')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
