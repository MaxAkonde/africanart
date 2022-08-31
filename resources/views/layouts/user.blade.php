<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href={{ asset("user/img/favicon.png") }}>

    @yield('extra-css')
</head>

<body>
    
    @include('layouts.inc.user.header')

    @yield('content')

    @include('layouts.inc.user.footer')

    @yield('extra-js')
</body>

</html>
