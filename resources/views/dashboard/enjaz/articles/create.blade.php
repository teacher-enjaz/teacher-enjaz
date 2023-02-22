<div class="modal fade add-initiative-eModal arrticles-modal" id="add-article-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered " style="overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addArticle')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" style="overflow-y: auto; height: 80vh;">
                <form id="articleForm" name="articleForm" method="POST" action="{{route('articles.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="floatingInput" name="title">
                        <label for="floatingInput" >{{__('enjaz.articleTitle')}}</label>
                        <div class="text-danger" id="titleError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" id="floatingSelect" name="classification_id" aria-label="Floating label select example">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($classifications->count() > 0)
                                @foreach($classifications as $classification)
                                    <option value="{{$classification->id}}">{{$classification->name}}</option>
                                @endforeach
                            @endif
                            <option value="-1">{{__('enjaz.others')}}</option>
                        </select>
                        <label for="floatingSelect">{{__('enjaz.classification')}}</label>
                        <div class="text-danger" id="classificationIdError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3" id="classification_name" style="display: none">
                        <input type="text" class="form-control" id="" name="name">
                        <label for="floatingInput" >{{__('enjaz.addClassification')}}</label>
                        <div class="text-danger" id="nameError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <textarea class="form-control articel-text"  rows="5" id="summerNote" name="details"></textarea>
                        <div class="text-danger" id="detailsError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <div class="lang form-check">
                            <input class="form-check-input" name="allow_comments" type="checkbox" value="1" id="flexCheckDefault" checked>
                            <label class="form-check-label mx-4" for="flexCheckDefault">
                                {{__('enjaz.allowComments')}}
                            </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="file" class="form-control" id="" name="image">
                        <label for="floatingInput" >{{__('enjaz.addImage')}}</label>
                        <div class="text-danger" id="imageArticleError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn draft-btn" name="saveDraft">{{__('enjaz.saveAsDraft')}}</button>
                        <button type="submit" class="btn custom-btn" name="publish">{{__('enjaz.publish')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
