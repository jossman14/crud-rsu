<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <title>@yield('judulSitus')</title>
    <meta content="Sistem Informasi Rumah Sakit" name="description" />
    <meta content="Tanzilal Mustaqim" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../layout/assets/images/favicon.png">
    @yield('css')

    <link href="../../layout/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="../../layout/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../../layout/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../../layout/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- App css -->
    <link href="../../layout/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/app.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        .bgGan {
            background: rgb(70, 103, 250);
            background: linear-gradient(31deg,
                    rgba(70, 103, 250, 1) 37%,
                    rgba(70, 170, 250, 1) 100%);
        }
    </style>
</head>

<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
    </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    </div> --}}
    @yield('content')
    <!-- jQuery  -->
    <script src="../../layout/assets/js/jquery.min.js"></script>
    <script src="../../layout/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../layout/assets/js/metisMenu.min.js"></script>
    <script src="../../layout/assets/js/waves.min.js"></script>
    <script src="../../layout/assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    <script src="../../layout/assets/js/app.js"></script>
    @yield('js')
</body>

</html>