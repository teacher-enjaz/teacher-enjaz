<div class="section-title mb-2 ">
    <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.memberships')}}</h1>
</div>
<div class="memberships mt-4">
    <div class="container">
        <div class="row">
            @foreach($memberships as $membership)
                <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                    <div class="membership-card card-2">
                        <i class="fa fa-address-card text-center"></i>
                        <p>{{$membership->organization->name}}</p>
                        <p>{{$membership->name}}</p>
                        <p>{{$membership->grant_date}}</p>
                        <p>{{$membership->validity}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
