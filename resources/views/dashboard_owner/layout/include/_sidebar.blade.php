<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="{{ auth()->guard('owner')->user()->image_path }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link">@lang('dashboard.my_salat')</a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu {{ request()->segment(2) == 'owner' ? 'active' : '' || request()->segment(2) == 'calendar' ? 'active' : '' }}">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('dashboard.dashboard')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                    <li class="{{ request()->segment(3) == '' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.welcome') }}">
                            @lang('dashboard.statistics')
                        </a>`
                    </li>
                    <li class="{{ request()->segment(3) == 'calendar' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.calendar') }}">
                            @lang('dashboard.calendar')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
            </li>

            <li class="menu active">
                <a href="#banner" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('owner.the_banners')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled 
                    {{ request()->segment(3) == 'banners' ? 'show' : '' || request()->segment(3) == 'gallerys' ? 'show' : '' }}" id="banner" data-parent="#accordionExample">
                    <li class="{{ request()->segment(3) == 'banners' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.banners.edit', auth()->guard('owner')->user()->banner->id) }}">
                            @lang('owner.exterior')
                        </a>
                    </li>
                    <li class="{{ request()->segment(3) == 'gallerys' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.gallerys.index') }}">
                            @lang('owner.interior')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ request()->segment(3) == 'packages' ? 'active' : '' }}">
                <a href="#package" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>@lang('owner.packages')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ request()->segment(3) == 'packages' ? 'show' : '' }}" id="package" data-parent="#accordionExample">
                    <li class="{{ request()->segment(3) == 'packages' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.packages.create') }}">
                            @lang('dashboard.create') @lang('owner.package')
                        </a>
                    </li>
                    <li class="{{ request()->segment(3) == 'packages' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.packages.index') }}">
                            @lang('dashboard.list') @lang('owner.package')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ request()->segment(3) == 'services' ? 'active' : '' }}">
                <a href="#service" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('owner.services')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ request()->segment(3) == 'services' ? 'show' : '' }}" id="service" data-parent="#accordionExample">
                    <li class="{{ request()->segment(3) == 'services' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.services.create') }}">
                            @lang('dashboard.create') @lang('owner.service')
                        </a>
                    </li>
                    <li class="{{ request()->segment(3) == 'services' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.services.index') }}">
                            @lang('dashboard.list') @lang('owner.service')
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ request()->segment(3) == 'payment_clients' ? 'active' : '' }}">
                <a href="#payment-client" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>@lang('owner.payment_clients')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ request()->segment(3) == 'payment_clients' ? 'show' : '' }}" id="payment-client" data-parent="#accordionExample">
                    <li class="{{ request()->segment(4) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.payment_clients.create') }}">
                            @lang('dashboard.create') @lang('owner.payment_clients')
                        </a>
                    </li>
                    <li class="{{ request()->segment(3) == 'payment_clients' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.owner.payment_clients.index') }}">
                            @lang('dashboard.list') @lang('owner.payment_clients')
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>
        
    </nav>

</div>