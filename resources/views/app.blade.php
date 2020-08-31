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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

    <!-- Custom js for this template -->
    <script defer src="{{ asset('js/spellbook.js') }}"></script>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/spellbook.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Burtažodžiai.lt</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item{{ (request()->is('/')) ? ' active' : '' }}">
                        <a class="nav-link" href="/"><i class="fas fa-home"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @php
                        $types = App\Type::orderBy('name', 'ASC')->get();
                        $parents = array();
                    @endphp
                    
                    @if ($types->count() > 0)
                        @foreach ($types as $type)
                            @php
                                if ($type->parent != 0) {
                                    array_push($parents, $type->parent);
                                }
                            @endphp
                        @endforeach
                        @foreach ($types as $type)
                            @if ($type->parent == 0)
                                @if (!in_array($type->id, $parents))
                                    <li class="nav-item px-2{{ (request()->is($type->type_url.'*')) ? ' active' : '' }}">
                                        <a class="nav-link" href="{{ route($type->type_url) }}">{{ $type->name }}</a>
                                    </li>
                                @else
                                    @php
                                        $statusActive = array();
                                        foreach ($types as $type3) {
                                            if ($type3->parent == $type->id) {
                                                if (request()->is($type3->type_url.'*')) {
                                                    array_push($statusActive, $type3->name);
                                                }
                                            }
                                        }  
                                    @endphp
                                    <li class="nav-item px-2 dropdown{{ (count($statusActive)) ? ' active' : '' }}">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ $type->name }}</a>
                                        <div class="dropdown-menu">
                                            @foreach ($types as $type2)
                                                @if ($type2->parent == $type->id)
                                                    <a class="dropdown-item" href="{{ route($type2->type_url) }}">{{ $type2->name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    @endif

                    <!--
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-key"></i> Prisijungti</a>
                    </li>
                    @endguest
                    -->
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-hat-wizard"></i> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin">Admin</a>
                            <a class="dropdown-item" href="{{ route('spells.index') }}">Burtažodžiai</a>
                            <a class="dropdown-item" href="{{ route('types.index') }}">Tipai</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users"></i> Vartotojai</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit()"><i class="fas fa-door-open"></i> Atsijungti</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>

                @if (!request()->is('/'))
                    {!! Form::open(array('url' => 'search', 'files' => true, 'class' => 'form-inline my-2 my-lg-0 mr-2 ml-auto')) !!}
                    {{ csrf_field() }}
                    <div class="input-group form-inline">
                        <div id="search-wrapper">
                            <input id="search-input" name="search" type="text" class="form-control form-control-sm" placeholder="Burtažodžio paieška"
                                aria-label="Burtažodžio paieška" aria-describedby="button-search">
                            <button id="search-button" type="submit" class="btn btn-sm btn-outline-light text-dark border-0 my-sm-0"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                   
                    {!! Form::close() !!}
                @endif
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

    @if (request()->is('/'))
        <!-- No Footer -->
    @else
        <!-- Footer -->
        <footer class="py-3">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
            </div>
            <!-- /.container -->
        </footer>
    @endif

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>