<aside class="app-sidebar">
    <x-user-side-bar/>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="{{route('home')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">{{__('dashboard.dashboard')}}</span>
            </a>
        </li>
        @can(['information','social-media'])
            <li>
                <a class="app-menu__item" href="{{route('dashboard.information.index')}}">
                    <i class="app-menu__icon fa fa-info-circle"></i>
                    <span class="app-menu__label">{{__('dashboard.information')}}</span>
                </a>
            </li>
        @endcan
        @can('permissions')
            <li>
                <a class="app-menu__item" href="{{route('dashboard.permissions.index')}}">
                    <i class="app-menu__icon fa fa-lock"></i>
                    <span class="app-menu__label">{{__('dashboard.permissions')}}</span>
                </a>
            </li>
        @endcan
        @can('roles')
            <li>
                <a class="app-menu__item" href="{{route('dashboard.roles.index')}}">
                    <i class="app-menu__icon fa fa-lock"></i>
                    <span class="app-menu__label">{{__('dashboard.roles')}}</span>
                </a>
            </li>
        @endcan
        @can('users')
            <li class="treeview is-expanded">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">{{__('dashboard.users')}}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.users.supervisorsTeachersIndex')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.supervisor')}} - {{__('dashboard.teacher')}}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.users.studentsIndex')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.student')}}
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.users.usersIndex')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.employee')}} - {{__('dashboard.parent')}}
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <li class="treeview is-expanded">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{__('dashboard.settings')}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu overflow-scroll">
                @can('geographic-places')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.geoplaces.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.geoPlaces')}}
                        </a>
                    </li>
                @endcan
                @can('directorates')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.directorates.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.directorates')}}
                        </a>
                    </li>
                @endcan
                @can('schools')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.schools.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.schools')}}
                        </a>
                    </li>
                @endcan
                @can('levels')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.levels.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.levels')}}
                        </a>
                    </li>
                @endcan
                @can('semesters')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.semesters.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.semesters')}}
                        </a>
                    </li>
                @endcan
                @can('grades')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.grades.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.grades')}}
                        </a>
                    </li>
                @endcan
                @can('subjects')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.subjects.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.subjects')}}
                        </a>
                    </li>
                @endcan
                @can('resource-types')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.resource-types.index')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.ResourceTypes')}}
                        </a>
                    </li>
                @endcan
                @can('books')
                    <li>
                        <a class="treeview-item" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.books')}}
                        </a>
                        <div class="collapse" id="collapseExample2">
                            <ul style="list-style: none">
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.books.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.books')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.interactiveBooks.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.interactiveBooks')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('units')
                    <li>
                        <a class="treeview-item" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.units')}}
                        </a>
                        <div class="collapse" id="collapseExample1">
                            <ul style="list-style: none">
                                @can('unit-categories')
                                    <li>
                                        <a class="treeview-item" href="{{route('dashboard.unit-categories.index')}}">
                                            <i class="icon fa fa-circle-o"></i> {{__('dashboard.unitCategories')}}
                                        </a>
                                    </li>
                                @endcan
                                @can('units')
                                    <li>
                                        <a class="treeview-item" href="{{route('dashboard.units.index')}}">
                                            <i class="icon fa fa-circle-o"></i> {{__('dashboard.units')}}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('lessons')
                    <li>
                        <a class="treeview-item" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.lessons')}}
                        </a>
                        <div class="collapse" id="collapseExample3">
                            <ul style="list-style: none">
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.video-types.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.VideoTypes')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.lessons.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.lessons')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('file-material-settings')
                    <li>
                        <a class="treeview-item" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.fileMaterials')}}
                        </a>
                        <div class="collapse" id="collapseExample4">
                            <ul style="list-style: none">
                                @can('file-categories')
                                    <li>
                                        <a class="treeview-item" href="{{route('dashboard.file-categories.index')}}">
                                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.fileCategories')}}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('show-file-material')
                    <li>
                        <a class="treeview-item" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.myFiles')}}
                        </a>
                        <div class="collapse" id="collapseExample5">
                            <ul style="list-style: none">
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.file-materials.myPublishedFiles')}}">
                                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.myPublishedFiles')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.file-materials.myWaitingFiles')}}">
                                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.myWaitingFiles')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.file-materials.myReturnedFiles')}}">
                                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.myReturnedFiles')}}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endcan
                @can('show-all-files')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.file-materials.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.allFileMaterials')}}
                        </a>
                    </li>
                @endcan
                {{-- check if this teacher or supervisor have subject committee permission --}}
                @can('show-subject-committee-files')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.file-materials.subjectIndex')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.subjectCommitteeFiles')}}
                        </a>
                    </li>
                @endcan
                @can('show-ministry-committee-files')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.file-materials.ministryIndex')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.ministryFiles')}}
                        </a>
                    </li>
                @endcan
                @can('supervisor-permission')
                    <li>
                        <a class="treeview-item" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.supervisor-permission')}}
                        </a>
                        <div class="collapse" id="collapseExample6">
                            <ul style="list-style: none">
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.file-materials.waitingFiles')}}">
                                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.waitingFiles')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.file-materials.publishedFilesForSupervisor')}}">
                                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.publishedFiles')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('videoLessons')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.video-lessons.index')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.video-lessons')}}
                        </a>
                    </li>
                @endcan
                @can('e-cards')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.e-cards.index')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.e-cards')}}
                        </a>
                    </li>
                @endcan
                @can('user-messages')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.contacts.index')}}">
                            <i class="icon fa fa-circle-o"></i>{{__('dashboard.userMessages')}}
                        </a>
                    </li>
                @endcan
                {{--<li>
                    <a class="treeview-item" href="{{route('dashboard.follows.index')}}">
                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.userFollows')}}
                    </a>
                </li><li>
                    <a class="treeview-item" href="--}}{{--{{route('dashboard.favourites.index')}}--}}{{--">
                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.userFavourites')}}
                    </a>
                </li>--}}
            </ul>
        </li>
        <li class="treeview is-expanded">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-flask" aria-hidden="true"></i>
                <span class="app-menu__label">{{__('dashboard.laboratories')}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                @can('news')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.laboratories.news.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.news')}}
                        </a>
                    </li>
                @endcan
                {{--<li>
                    <a class="treeview-item" data-toggle="collapse" href="#library" role="button" aria-expanded="false" aria-controls="library">
                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.library')}}
                    </a>
                    <div class="collapse" id="library">
                        <ul style="list-style: none">
                            @can('lab-categories')
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.laboratories.categories.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.libraryCategories')}}
                                    </a>
                                </li>
                            @endcan
                            @can('lab-categories')
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.laboratories.concepts.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.concepts')}}
                                    </a>
                                </li>
                            @endcan
                            @can('library-contents')
                                <li>
                                    <a class="treeview-item" href="{{route('dashboard.laboratories.labContents.index')}}">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.addLibrary')}}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>--}}
            </ul>
        </li>
        {{--<li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-flask" aria-hidden="true"></i>
                <span class="app-menu__label">{{__('dashboard.laboratories')}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                @can('news')
                    <li>
                        <a class="treeview-item" href="{{route('dashboard.laboratories.news.index')}}">
                            <i class="icon fa fa-circle-o"></i>  {{__('dashboard.news')}}
                        </a>
                    </li>
                @endcan

                <li>
                    <a class="treeview-item" data-toggle="collapse" href="#library" role="button" aria-expanded="false" aria-controls="library">
                        <i class="icon fa fa-circle-o"></i>{{__('dashboard.library')}}
                    </a>
                    <div class="collapse" id="library">
                        <ul style="list-style: none">
                            <li>
                                <a class="treeview-item" href="--}}{{--{{route('dashboard.unit-categories.index')}}--}}{{--">
                                    <i class="icon fa fa-circle-o"></i> {{__('dashboard.concepts')}}
                                </a>
                            </li>
                            --}}{{--@can('unit-categories')--}}{{--
                                <li>
                                    <a class="treeview-item" href="--}}{{--{{route('dashboard.unit-categories.index')}}--}}{{--">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.libraryCategories')}}
                                    </a>
                                </li>
                           --}}{{-- @endcan
                            @can('units')--}}{{--
                                <li>
                                    <a class="treeview-item" href="--}}{{--{{route('dashboard.units.index')}}--}}{{--">
                                        <i class="icon fa fa-circle-o"></i> {{__('dashboard.addLibrary')}}
                                    </a>
                                </li>
                            --}}{{--@endcan--}}{{--
                        </ul>
                    </div>
                </li>
            </ul>
        </li>--}}
    </ul>
</aside>
