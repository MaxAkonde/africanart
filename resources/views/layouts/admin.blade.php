<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('admin/assets/css/animate.min.css') }}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('admin/assets/css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('admin/assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        @include('layouts.inc.admin.header')

        <div class="main-panel">
            @include('layouts.inc.admin.navbar')


            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>


            @include('layouts.inc.admin.footer')

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('admin/assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ asset('admin/assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('admin/assets/js/bootstrap-notify.js') }}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{ asset('admin/assets/js/demo.js') }}"></script>

</html>
