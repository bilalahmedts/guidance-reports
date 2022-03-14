<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">GUIDANCE REPORTS</li>
        <li class="nav-item">
        <li class="nav-item">
            <a href="{{ route('reports.create') }}" class="nav-link">
                <i class="far fa fa-plus nav-icon"></i>
                <p>Create Entry</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('reports.index') }}" class="nav-link">
                <i class="far fa fa-eye nav-icon"></i>
                <p>View Entries</p>
            </a>
        </li>
        @if (in_array(Auth::user()->roles[0]->name, ['Super Admin', 'Manager']))
        <li class="nav-item">
            <a href="{{ route('reports.guidance-reports') }}" class="nav-link">
                <i class="far fa-file nav-icon"></i>
                <p>View Report</p>
            </a>
        </li>
        </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teams.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teams</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
