<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <div class="logo"></div>
        <ul class="nav metismenu" id="side-menu">
            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Planillas</span> </a>
            </li>
            <li class="{{ isActiveRoute('logger') }}">
                <a href="{{ url('/logger') }}" target="_blank"><i class="fa fa-th-large"></i> <span class="nav-label">Log de cambios</span> </a>
            </li>
        </ul>

    </div>
</nav>
