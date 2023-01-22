@if (session('error'))
    <div class="alert alert-dismissible alert-danger text-right">
        <button class="close text-right my-auto" type="button" data-dismiss="alert">×</button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif

