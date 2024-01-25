<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('company.dashboard') }}"><i class="fas fa-pencil-ruler"></i>
                    <span>@lang('Dashboard')</span>
                </a>
            </li>
            <li class="{{ Request::is('company/users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('company.users.index') }}"><i class="fas fa-pencil-ruler"></i>
                    <span>@lang('Users')</span>
                </a>
            </li>

               <li class="{{ Request::is('company/projects*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('company.projects.index') }}"><i class="fas fa-pencil-ruler"></i>
                    <span>@lang('Projects')</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
