<div class="modal fade bio-eModal" id="add-bio-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabelBIO">{{__('enjaz.addBio')}}     </h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-hint">
                <p> {{__('enjaz.summarizeBio')}}</p>
            </div>
            <form id="bioForm" name="bioForm" method="POST" action="{{route('bios.store')}}">
                @csrf
            <div class="modal-body p-3 m-5 mt-0" >
                <div class="form-floating mb-3 ms-3">
                        <textarea  class="form-control" id="floatingInputBIO" rows="4" name="info"></textarea>
                    <label for="floatingInput" > {{__('enjaz.bio')}}   </label>
                    <div class="text-danger" id="infoError"></div>
                </div>
                <button type="submit" class="btn custom-btn" id="saveBtn"> {{__('enjaz.save')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
