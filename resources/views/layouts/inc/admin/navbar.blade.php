<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">African Dashboard</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item {{ $active == 'dashboard' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active == 'categories' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Catégories</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active == 'products' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.products.index') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Produits</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active == 'orders' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('orders.index') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Commandes</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active == 'users' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Utilisateurs</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active == 'roles' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.roles.index') }}">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Roles</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active == 'countries' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.countries.index') }}">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle">Pays</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
