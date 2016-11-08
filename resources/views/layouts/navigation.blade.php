<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <div class="logo"></div>
        <ul class="nav metismenu" id="side-menu">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}"><i class="fa fa-unlock"></i> <span class="nav-label">Login</span></a></li>
                <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus"></i> <span class="nav-label">Register</span></a></li>
            @else
                <li class="{{ isActiveRoute('main') }}">
                    <a href="{{ url('/') }}"><i class="fa fa-files-o"></i> <span class="nav-label">Planillas</span> </a>
                </li>
            @endif
        </ul>

    </div>
</nav>
