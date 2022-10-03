<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('index') }}"> <img src={{ asset('user/img/logo.png') }} alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shop') }}">
                                    Boutique
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">A Propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon1 d-flex1">
                        {{-- <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a> --}}
                        <ul class="navbar-nav1" style="display:flex;">
                            <li class="nav-item1">
                                <a class="nav-link" href="{{ route('cart.index') }}" style="display: flex;">
                                    <div>
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    @if (Cart::count() > 0)
                                        <div
                                            style="border-radius:50%;background-color:#ff0000;color:#fff;width:14px;height:14px;font-size:10px;display:flex;align-items:center;justify-content:center;margin-top:-5px;margin-left:-5px;z-index:9999;">
                                            {{ Cart::count() }}
                                        </div>
                                    @endif

                                </a>
                            </li>

                            <li class="nav-item1 dropdown" style="padding:0px;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{-- <i class="ti-user"></i> --}}
                                    @guest
                                        <i class="fas fa-user"style="margin:0px"></i>
                                    @else
                                        <i class="fas fa-user-check" style="margin: 0px"></i>
                                    @endguest
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2"
                                    style="margin-left:-102px;">
                                    @guest
                                        <a class="dropdown-item" href="{{ route('login') }}">Se connectez</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Créer un compte</a>
                                    @else
                                        <a class="dropdown-item" href="#"
                                            style="text-decoration: none">{{ Auth::user()->name }}</a>
                                        <hr>
                                        <a class="dropdown-item" href="#">Commandes</a>
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endguest
                                </div>
                            </li>

                        </ul>

                        {{-- <a href="{{ route('login') }}"><i class="ti-user"></i></a> --}}
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{-- <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div> --}}
</header>
<!-- Header part end-->
