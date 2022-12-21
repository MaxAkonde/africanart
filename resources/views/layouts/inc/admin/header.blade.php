<div class="sidebar" data-color="purple" data-image="{{ asset('admin/assets/img/sidebar-5.jpg') }}">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                African Dashboard
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="#">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="pe-7s-folder"></i>
                    <p>Catégories</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="pe-7s-note2"></i>
                    <p>Produits</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="pe-7s-note2"></i>
                    <p>Commande</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Utilisateurs</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.roles.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Roles</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.countries.index') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Pays</p>
                </a>
            </li>
        </ul>
    </div>
</div>