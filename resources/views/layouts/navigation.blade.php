<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <div class="logo"></div>
        <ul class="nav metismenu" id="side-menu">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}"><i class="fa fa-unlock"></i> <span class="nav-label">Login</span></a></li>
            @else
                <li class="{{ isActiveRoute('main') }}">
                    <a href="{{ url('/') }}"><i class="fa fa-files-o"></i> <span class="nav-label">Planillas</span> </a>
                </li>
                @if(Auth::user()->rol === 'admin')
                    @if(isActiveRoute('administracion') || isActiveRoute('admin_feriados'))
                    <li class="active">
                    @else
                        <li>
                    @endif
                        <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Administracion</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse out">
                            <li class="{{ isActiveRoute('admin_feriados') }}"><a href="{{ url('/administracion/feriados') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Dias Feriados</span> </a></li>
                        </ul>
                    </li>
                @endif
            @endif
        </ul>

    </div>
</nav>
