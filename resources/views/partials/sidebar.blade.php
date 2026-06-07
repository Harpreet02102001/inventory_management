<div class="sidebar">

    <div class="sidebar-menu">

        <a href="/" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('categories') }}"
            class="sidebar-link {{ request()->routeIs('categories*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i>
            <span>Categories</span>
        </a>

        <a href="{{ route('supplier') }}"
            class="sidebar-link {{ request()->routeIs('supplier*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i>
            <span>Suppliers</span>
        </a>

        <a href="{{ route('product') }}"
            class="sidebar-link {{ request()->routeIs('product*') ? 'active' : '' }}">
            <i class="bi bi-box"></i>
            <span>Products</span>
        </a>

        <a href="{{ route('stock') }}"
            class="sidebar-link {{ request()->routeIs('stock*') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span>Stock History</span>
        </a>

        <a href="{{ route('user.index') }}"
            class="sidebar-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span>Users</span>
        </a>

    </div>

    <div class="sidebar-footer">
        © 2024 Mini Inventory System
    </div>

</div>