{{--Notification menu--}}
<style>
    .dropdown-menu {
        border-radius: 0;
        box-shadow: 0 8px 17px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
    }
    .app-notification__title {
        padding: 8px 20px;
        text-align: center;
        background-color: rgba(0, 150, 136, 0.4);
        color: #333;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 10rem;
        padding: 0 0;
        margin: 0 0 0;
        font-size: 0.875rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #FFF;
        background-clip: padding-box;
        border: 0 solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
    }
    .app-notification__content {
        max-height: 220px;
        overflow-y: auto;
    }
    .dropdown-item {
        display: block;
        width: 100%;
        padding: 8px 20px;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .app-notification__item {
        display: flex;
        padding: 8px 20px;
        color: inherit;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s ease;
    }

    .app-notification__icon {
        padding-right: 10px;
    }
    .app-notification__message {
        line-height: 1.2;
    }
    .app-notification__message, .app-notification__meta {
        margin-bottom: 0;
        margin-right: 3px;
    }
    .text-right {
        text-align: right !important;
    }
    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .text-muted, .app-notification__meta {
        color: #6c757d !important;
    }
    .app-notification__item:focus, .app-notification__item:hover {
        color: inherit;
        text-decoration: none;
        background-color: #e0e0e0;
    }
    .nav-link:hover, .nav-link:focus {
        text-decoration: none;
    }
    a:hover {
        color: #004a43;
        text-decoration: underline;
    }

    .app-sidebar__user-avatar {
        flex: 0 0 auto;
    }
    .rounded-circle, .app-sidebar__user-avatar {
        border-radius: 50% !important;
    }
    img {
        vertical-align: middle;
        border-style: none;
    }
    .app-notification__footer {
        padding: 8px 20px;
        text-align: center;
        background-color: #eee;
    }
    .app-notification__content::-webkit-scrollbar {
        width: 6px;
    }
    .app-notification__content::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.2);
    }
    .unread{
        background: rgba(0, 0, 0, 0.2);
    }
</style>
<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
<li class="dropdown d-flex justify-content-center my-auto px-1">
    <a class="app-nav__item text-decoration-none p-0 text-center mx-auto" href="#" data-bs-toggle="dropdown"
       aria-label="Show notifications" style="background-color: #00000000;">
        <i class="fa fa-bell-o fa-lg  btn_icon rounded-circle my-auto "></i>
        @if($unreadCount != 0)
            <span class="badge badge-danger bg-danger p-1" style="position: absolute; top: -4px; right: 23px;font-size: 10px;">{{$unreadCount}}</span>
        @endif
    </a>
    <ul class="dropdown-menu" style="left: -120px;right: auto;">
        <li class="app-notification__title">{{__('dashboard.youHave')}} {{$unreadCount}} {{__('dashboard.newNotifications')}}</li>
        <div class="app-notification__content">
            @foreach($notifications as $notification)
                <li class="dropdown-item {{$notification->unread() ? 'unread fw-bold':''}}">
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
            <li class="app-notification__footer"><a href="{{route('notifications')}}" style="color:#009688">{{__('dashboard.showAll')}}</a></li>
            <li class="app-notification__footer"><a href="javascript:0;" onclick="markAsRead();" style="color:#009688">{{__('dashboard.markAsRead')}}</a></li>
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
</script>
