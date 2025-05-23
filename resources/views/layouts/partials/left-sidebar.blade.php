<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="d-none d-md-block sidebar min-vh-100">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tiket-gangguan.*') ? 'active' : '' }}" href="{{ route('tiket-gangguan.index') }}">
                            <i class="bi bi-grid"></i> Tiket Gangguan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('material.*') ? 'active' : '' }}" href="{{ route('material.index') }}">
                            <i class="bi bi-box"></i> Material
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('work-order.*') ? 'active' : '' }}" href="{{ route('workorder.index') }}">
                            <i class="bi bi-ui-checks"></i> Work Order
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>