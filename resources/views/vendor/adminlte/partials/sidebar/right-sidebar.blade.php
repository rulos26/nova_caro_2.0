<aside class="control-sidebar control-sidebar-{{ config('adminlte.right_sidebar_theme') }}">
    @yield('right-sidebar')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <li class="nav-item">
                <a href="{{ route('departamentos.index') }}" class="nav-link {{ request()->routeIs('departamentos.index') ? 'active' : '' }}">
                    <i class="fas fa-globe nav-icon text-primary"></i>
                    <p>Departamentos</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('municipios.index') }}" class="nav-link {{ request()->routeIs('municipios.index') ? 'active' : '' }}">
                    <i class="fa fa-city nav-icon text-warning"></i>
                    <p>Ciudades</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reporte.carta') }}" class="nav-link {{ request()->routeIs('reporte.carta') ? 'active' : '' }}">
                    <i class="fa fa-file-pdf nav-icon text-danger"></i>
                    <p>Reportes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('informes.create') }}" class="nav-link {{ request()->routeIs('informes.create') ? 'active' : '' }}">
                    <i class="fa fa-check-circle nav-icon text-success"></i>
                    <p>Fin Reporte</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('modulos.index') }}" class="nav-link {{ request()->routeIs('modulos.index') ? 'active' : '' }}">
                    <i class="fas fa-cubes nav-icon text-info"></i>
                    <p>Módulos</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('links.index') }}" class="nav-link {{ request()->routeIs('links.index') ? 'active' : '' }}">
                    <i class="fas fa-link nav-icon text-primary"></i>
                    <p>Links Módulos</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('filtros-pdfs.index') }}" class="nav-link {{ request()->routeIs('filtros-pdfs.index') ? 'active' : '' }}">
                    <i class="fas fa-filter nav-icon text-primary"></i>
                    <p>Filtro Informe final</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon text-primary"></i>
                    <p>Usuarios del Sistema</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/settings" class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                    <i class="fas fa-user nav-icon text-warning"></i>
                    <p>Perfil</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/settings" class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                    <i class="fas fa-lock nav-icon text-danger"></i>
                    <p>Cambiar Contraseña</p>
                </a>
            </li>
        </ul>
    </nav>
</aside>
