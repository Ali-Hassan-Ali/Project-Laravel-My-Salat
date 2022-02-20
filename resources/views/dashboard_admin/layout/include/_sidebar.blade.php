<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ auth()->guard('admin')->user()->image_path }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> CORK </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu active">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                    <li class="active">
                        <a href="{{ route('dashboard.admin.welcome') }}">
                            stitc
                        </a>
                    </li>
                    <li>
                        <a href="index2.html">
                            Sales
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
            </li>

            <li class="menu active">
                <a href="#Admin" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Admin</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="Admin" data-parent="#accordionExample">
                    <li class="active">
                        <a href="{{ route('dashboard.admin.admins.index') }}">list Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.admin.admins.create') }}">create new admin</a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ request()->segment(2) == 'categoreys' ? 'active' : '' }}">
                <a href="#Category" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('admin.categoreys')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled 
                        {{ request()->segment(2) == 'categoreys' ? 'show' : '' }}" id="Category" data-parent="#accordionExample">
                    <li class="{{ request()->segment(2) == 'categoreys' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.categoreys.index') }}">@lang('dashboard.list') @lang('admin.categoreys')</a>
                    </li>
                    <li class="{{ request()->segment(2) == 'categoreys' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.categoreys.create') }}">@lang('dashboard.create') @lang('admin.categoreys')</a>
                    </li>
                </ul>
            </li>

            <li class="menu active">
                <a href="#Owner" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="{{ request()->segment(2) == 'owners' ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('admin.owners')</span>
                    </div>
                    <div class="{{ request()->segment(2) == 'owners' ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled
                        {{ request()->segment(2) == 'owners' ? 'show' : '' }}" id="Owner" data-parent="#accordionExample">
                    <li class="{{ request()->segment(2) == 'owners' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.owners.index') }}">@lang('dashboard.list') @lang('admin.owners')</a>
                    </li>
                    <li class="{{ request()->segment(2) == 'owners' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.owners.create') }}">@lang('dashboard.create') @lang('admin.owners')</a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ request()->segment(2) == 'bookings' ? 'active' : '' }}">
                <a href="#booking" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="{{ request()->segment(2) == 'bookings' ? 'show' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('admin.bookings')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled 
                        {{ request()->segment(2) == 'bookings' ? 'show' : '' }}" id="booking" data-parent="#accordionExample">
                    <li class="{{ request()->segment(2) == 'bookings' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.bookings.index') }}">@lang('dashboard.list') @lang('admin.bookings')</a>
                    </li>
                    <li class="{{ request()->segment(2) == 'bookings' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.bookings.create') }}">@lang('dashboard.create') @lang('admin.bookings')</a>
                    </li>
                </ul>
            </li>


            <li class="menu {{ request()->segment(3) == 'service_categorys' ? 'active' : '' }}">
                <a href="#service-category" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>@lang('owner.service_categorys')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ request()->segment(3) == 'service_categorys' ? 'show' : '' }}" id="service-category" data-parent="#accordionExample">
                    <li class="{{ request()->segment(3) == 'service_categorys' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.service_categorys.create') }}">
                            @lang('dashboard.create') @lang('owner.service_category')
                        </a>
                    </li>
                    <li class="{{ request()->segment(3) == 'service_categorys' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.admin.service_categorys.index') }}">
                            @lang('dashboard.list') @lang('owner.service_category')
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        
    </nav>

</div>