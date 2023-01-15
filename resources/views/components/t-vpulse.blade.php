<li class="nav-item d-flex justify-content-center">
    <div class="blobs-container py-3">
        <div class="{{$pulsclass}}" id="{{$pulsId}}"></div>
    </div>
    <a class="nav-link px-0" href="{{route('tv.index')}}">{{__('tv.liveBroadcast')}}</a>
</li>
<li class="nav-item {{--dropdown--}}">
    <a class="nav-link {{--dropdown-toggle--}}" href="{{route('tv.programs')}}" id="{{--navbarDropdown--}}" role="button" {{--data-toggle="dropdown"--}} aria-haspopup="true" aria-expanded="false">
        {{__('tv.programs')}}
    </a>
    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item text-right" href="{{route('tv.allGrades')}}">{{__('tv.learningVideos')}}</a>
        @foreach($programs as $program)
            <a class="dropdown-item text-right" href="{{route('tv.program',$program->slug)}}">{{$program->name}}</a>
        @endforeach
    </div>--}}
</li>
