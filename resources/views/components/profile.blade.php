@can('profile')
    @if($authUser->role[0]->slug == 'student')
        <li>
            <a class="dropdown-item" href="{{route('dashboard.profile.editStudent')}}">
                <i class="fa fa-user fa-lg"></i>{{ __('dashboard.profile') }}
            </a>
        </li>
    @elseif($authUser->role[0]->slug == 'supervisor' || $authUser->role[0]->slug == 'teacher')
        <li>
            <a class="dropdown-item" href="{{route('dashboard.profile.editSupervisor')}}">
                <i class="fa fa-user fa-lg"></i>{{ __('dashboard.profile') }}
            </a>
        </li>
    @else
        <li>
            <a class="dropdown-item" href="{{route('dashboard.profile.editUser')}}">
                <i class="fa fa-user fa-lg"></i>{{ __('dashboard.profile') }}
            </a>
        </li>
    @endif
@endcan
