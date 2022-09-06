<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#"> <img src={{ asset('user/img/logo.png') }} alt="logo"> </a>
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
                                <a class="nav-link" href="{{ route('cart') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </li>

                            <li class="nav-item1 dropdown" style="padding:0px;">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-user" style="margin:0px"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2" style="margin-left:-102px;">
                                    <a class="dropdown-item" href="login.html"> login</a>
                                    <a class="dropdown-item" href="tracking.html">tracking</a>
                                    <a class="dropdown-item" href="checkout.html">product checkout</a>
                                    <a class="dropdown-item" href="cart.html">shopping cart</a>
                                    <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                    <a class="dropdown-item" href="elements.html">elements</a>
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
