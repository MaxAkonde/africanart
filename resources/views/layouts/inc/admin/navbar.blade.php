<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ $active == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Inventaire</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown {{ $active == 'categories' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-archive"></i>Catégories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('admin.categories.create') }}">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="{{ route('admin.categories.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown {{ $active == 'products' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Produits</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('admin.products.create') }}">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="{{ route('admin.products.index') }}">Liste</a></li>
                    </ul>
                </li>

                <li class="{{ $active == 'orders' ? 'active' : '' }}">
                    <a href="{{ route('orders.index') }}"><i class="menu-icon fa fa-truck"></i>Commande </a>
                </li>

                <li class="menu-item-has-children dropdown {{ $active == 'users' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Utilisateurs</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('admin.users.create') }}">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="{{ route('admin.users.index') }}">Liste</a></li>
                    </ul>
                </li>

                <li class="menu-title">Parametre</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown {{ $active == 'roles' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-flag-o"></i>Roles</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('admin.roles.create') }}">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="{{ route('admin.roles.index') }}">Liste</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown {{ $active == 'countries' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-flag-o"></i>Villes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('admin.countries.create') }}">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="{{ route('admin.countries.index') }}">Liste</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown {{ $active == 'payments' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-flag-o"></i>Méthode de Paiement</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('admin.payments.create') }}">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="{{ route('admin.payments.index') }}">Liste</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
