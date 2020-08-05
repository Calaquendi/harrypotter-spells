<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fontawesome Kit JS -->
    <script src="https://kit.fontawesome.com/e354dbdd31.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/spellbook.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Burtažodžiai.lt</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @php
                    $types = App\Type::all();
                    @endphp
                    @if ($types->count() > 0)
                    @foreach ($types as $type)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($type->type_url) }}">{{ $type->name }}</a>
                    </li>
                    @endforeach
                    @endif
                    <!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Transfigūracija</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Sukūrimo kerai</a>
                            <a class="dropdown-item" href="#">Transfigūraciniai kerai</a>
                        </div>
                    </li>

-->

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Prisijungti</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin">Admin</a>
                            <a class="dropdown-item" href="{{ route('spells.index') }}">Burtažodžiai</a>
                            <a class="dropdown-item" href="{{ route('types.index') }}">Tipai</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit()">Atsijungti</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <content>
        <!-- Page Content -->
        <div class="container">

            @yield('content')

        </div>
    </content>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>