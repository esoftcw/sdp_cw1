<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('users.show', auth()->user()) }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            @if(auth()->user()->role == 'system-admin')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Users') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('centers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-location-arrow"></i>
                        <p>
                            {{ __('Centers') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vehicles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bus"></i>
                        <p>
                            {{ __('Vehicles') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('routes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-road"></i>
                        <p>
                            {{ __('Routes') }}
                        </p>
                    </a>
                </li>
            @endif
            @if(auth()->user()->role = 'center-admin')
                <li class="nav-item">
                    <a href="{{ route('pickups.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('Pickups') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statuses.create', 'received_pickup') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('Pickup Receive') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statuses.create', 'on_transit') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('On Transit') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statuses.create', 'receive_transit') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('Receive From Transit') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statuses.create', 'on_delivery') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('Running Sheet') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statuses.create', 'on_hold') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('On Hold') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statuses.create', 'delivered') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>
                            {{ __('Delivered') }}
                        </p>
                    </a>
                </li>
            @endif
            {{--
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li>
            --}}

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
