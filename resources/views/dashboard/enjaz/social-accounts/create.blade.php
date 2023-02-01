<div class="modal fade" id="add-accounts-eModal" tabindex="-1" aria-labelledby="add-edu-eModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">{{__('enjaz.addAccountsEnjazCpanel')}}</h5>
                <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 m-5 mt-0" >
                <div id="custom-alert" class="alert alert-danger" style="display: none;"></div>
                <form id="accountForm" name="" method="POST" action="{{route('social-accounts.store')}}">
                    @csrf
                    <div class="form-floating mb-3 ms-3">
                        <select class="form-select" aria-label="Floating label select example" name="social_platforms_id">
                            <option label="{{__('enjaz.select')}}"></option>
                            @if($platforms->count() > 0)
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <label for="floatingSelect">{{__('enjaz.job')}}</label>
                        <div class="text-danger" id="namePlatformError"></div>
                    </div>
                    <div class="form-floating mb-3 ms-3">
                        <input type="text" class="form-control" id="" name="link">
                        <label for="floatingInput" >{{__('enjaz.socialAccountLink')}}</label>
                        <div class="text-danger" id="linkError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn custom-btn" id="saveBtn">{{__('enjaz.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
