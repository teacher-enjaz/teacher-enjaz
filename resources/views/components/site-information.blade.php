<a class="app-header__logo" href="">
    @if(isset($siteInfo))
        @if(Storage::exists('/public/information/'.$siteInfo->logo))
            <img class="app-sidebar__user-avatar"
                 src="{{url('/storage/information',$siteInfo->logo)}}" alt="User Image"
                 width="40px" height="40px">
        @else
            <img class="app-sidebar__user-avatar" src="{{ url('/template/icons/logo.png') }}" alt="User Image"
                 width="40px" height="40px">
        @endif
    @else
        <img class="app-sidebar__user-avatar" src="{{ url('/template/icons/logo.png') }}" alt="User Image"
             width="40px" height="40px">
    @endif
</a>
