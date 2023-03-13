<div class="container articles my-5 pt-3">
    <div class="row section-title my-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.awardsCompetitions')}}</h1>
    </div>
    @if($awards->count() > 0)
        <div class="articles mt-4">
            <div class="container">
                <div class="row">
                    @foreach($awards as $award)
                        <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                            <a href="{{route('main.show.awards',['id'=>$award->award->id])}}">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-header">
                                        {{$award->award->name}}
                                    </div>
                                    <img src="{{url('storage/awards/'.$award->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="info-1 d-flex justify-content-between">
                                            <div class="user-name card-text-a">
                                                <i class="fas fa-user"></i>
                                                {{$award->award->donor}}
                                            </div>
                                            <div class="statics-info card-text-a">
                                                <i class="fas fa-calendar ms-2"></i>{{$award->obtained_date}}
                                            </div>
                                        </div>
                                        <p class="card-text">
                                        <div class="info-2 d-flex justify-content-between mt-2">
                                            <div class="user-name card-text-a">
                                                <div  class="publisher">
                                                    <span>{{$award->award->description}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
