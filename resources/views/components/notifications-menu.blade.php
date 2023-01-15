    {{--Notification menu--}}
    <style>
        .unread{
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <li class="dropdown d-flex justify-content-center my-auto px-1">
        <a class="app-nav__item text-decoration-none p-0 text-center mx-auto" href="#" data-toggle="dropdown" aria-label="Show notifications" style="background-color: #00000000;">
            <i class="fa fa-bell-o fa-lg  btn_icon rounded-circle my-auto "></i>
            @if($unreadCount != 0)
                <span class="badge badge-danger bg-danger p-1" style="position: absolute; top: -4px; right: -6px;font-size: 10px;">{{$unreadCount}}</span>
            @endif
        </a>
        <ul class="dropdown-menu" style="left: auto;right: auto;">
            <li class="app-notification__title">{{__('dashboard.youHave')}} {{$unreadCount}} {{__('dashboard.newNotifications')}}</li>
            <div class="app-notification__content">
                @foreach($notifications as $notification)
                    <li class="dropdown-item {{$notification->unread() ? 'unread fw-bold':''}}" >
                        <a class="nav-link app-notification__item ml-1" href="{{$notification->data['url']}}?notify_id={{$notification->id}}" target="_blank">
                        <span class="app-notification__icon">
                            <span class="fa-stack fa-lg">
                                @if($notification->data['icon'] == '')
                                    <img class="app-sidebar__user-avatar"
                                         src="{{url('/template/icons/female.png')}}" alt="User Image"
                                         width="40px" height="40px">
                                @else
                                    <img class="app-sidebar__user-avatar"
                                         src="{{url('/storage/profile',$notification->data['icon'])}}" alt="User Image"
                                         width="40px" height="40px">
                                @endif
                            </span>
                        </span>
                            <div>
                                <p class="app-notification__message text-right">{{$notification->data['body']}}</p>
                                <p class="app-notification__meta text-right">{{$notification->created_at->diffForHumans()}}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </div>
            <div class="d-flex justify-content-center app-notification__footer">
                <li class="app-notification__footer"><a href="{{route('notifications')}}">{{__('dashboard.showAll')}}</a></li>
                <li class="app-notification__footer"><a href="javascript:0;" onclick="markAsRead();">{{__('dashboard.markAsRead')}}</a></li>
            </div>
        </ul>
    </li>

    <script>
        function markAsRead() {
            $.ajax({
                url: '/markAsRead',
                type: 'GET',
                dataType: 'json',
                success: function () {
                    window.location.reload()
                }
            });
        }
    </script>


