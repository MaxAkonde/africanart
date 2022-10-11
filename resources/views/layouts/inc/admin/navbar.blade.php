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
                        aria-expanded="false"> <i class="menu-icon fa fa-archive"></i>Catégorie</a>
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

                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Vendeurs</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="#">Ajouter</a></li>
                        <li><i class="fa fa-list"></i><a href="#">Liste</a></li>
                    </ul>
                </li> --}}

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
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="#">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="#">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="#">Tabs</a></li>

                        <li><i class="fa fa-id-card-o"></i><a href="#">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="#">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="#">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="#">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="#">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="#">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="#">Typography</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="#">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="#">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="#">Advanced Form</a></li>
                    </ul>
                </li>

                <li class="menu-title">Icons</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="#">Font
                                Awesome</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="#">Themefy Icons</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="#">Chart JS</a>
                        </li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="#">Flot Chart</a>
                        </li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="#">Peity Chart</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="#">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="#">Vector Maps</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="#">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="#">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="#">Forget Pass</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
