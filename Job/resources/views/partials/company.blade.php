<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="http://localhost:8000/">
            <b>FindJob!!!</b>
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('company.create') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon"></i>
                Insert Job
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>