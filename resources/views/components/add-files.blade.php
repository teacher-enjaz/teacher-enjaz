@auth()
    @if(Auth::user()->role->first()->slug != 'user' && Auth::user()->role->first()->slug != 'student')
        <div class="icon_fixed">
            <div class="menu " >
                <input type="checkbox" href="#" class="menu-open btn_icon rounded-circle" name="menu-open" id="menu-open">
                <label class="menu-open-button rounded-circle" for="menu-open"><i class="fa fa-plus" style="line-height: 50px;"></i></label>
                @can('add-file-material')
                    <a href="{{route('dashboard.file-materials.create')}}" class="menu-item item-1 rounded-circle tooltiplink" data-title="إضافة مادة تعليمية">
                        <i class="fa fa-file-o rounded-circle size-11" style="line-height: 42px;"  aria-hidden="true"></i>
                    </a>
                @endcan
                @can('videoLessons')
                    <a href="{{route('dashboard.video-lessons.create')}}"   class="menu-item item-2 rounded-circle tooltiplink" data-title="إضافة فيديو مصوّر">
                        <i class="fa fa-file-video-o rounded-circle size-11" style="line-height: 42px;"  aria-hidden="true"></i>
                    </a>
                @endcan
                @can('e-cards')
                    <a  href="{{route('dashboard.e-cards.createStep1')}}"
                         class="menu-item item-3 rounded-circle tooltiplink" data-title="إضافة بطاقة تعليمية">
                        <i class="fa fa-credit-card rounded-circle size-11" style="line-height: 42px;"  aria-hidden="true"></i>
                    </a>
                @endcan
            </div>
        </div>
    @endif
@endauth



