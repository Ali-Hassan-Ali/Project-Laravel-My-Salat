<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar" style="::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth('admin')->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth('admin')->user()->name }}</p>
            {{-- <p class="app-sidebar__user-designation">{{ auth('admin')->user()->roles->first()->name }}</p> --}}
        </div>
    </div>

    <ul class="app-menu">

        <li><a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('dashboard.admin.home') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('site.home')</span></a></li>

        {{--owners--}}
        @if (auth()->user()->hasPermission('owners_read'))
            <li><a class="app-menu__item {{ request()->segment(3) == 'owners' ? 'active' : '' }}" href="{{ route('dashboard.admin.owners.index') }}"><i class="app-menu__icon fas fa-tools"></i> <span class="app-menu__label">@lang('owners.owners')</span></a></li>
        @endif

        @if (auth()->user()->hasPermission('users_read'))
            <li><a class="app-menu__item {{ request()->segment(3) == 'users' ? 'active' : '' }}" href="{{ route('dashboard.admin.users.index') }}"><i class="app-menu__icon fas fa-tools"></i> <span class="app-menu__label">@lang('users.users')</span></a></li>
        @endif

        {{--admins--}}
        @if (auth()->user()->hasPermission('admins_read'))
            <li><a class="app-menu__item {{ request()->segment(3) == 'admins' ? 'active' : '' }}" href="{{ route('dashboard.admin.admins.index') }}"><i class="app-menu__icon fas fa-tools"></i> <span class="app-menu__label">@lang('admins.admins')</span></a></li>
        @endif


    

        {{--profile--}}
        {{-- <li class="treeview {{ request()->is('*profile*') || request()->is('*password*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">@lang('users.profile')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('admin.profile.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.edit_profile')</a></li>
                <li><a class="treeview-item" href="{{ route('admin.profile.password.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('users.change_password')</a></li>
            </ul> --}}
        </li>

    </ul>
</aside>
