@extends('app')

@section('title', 'Valdymo skydelis' )

<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>

<!-- CKEditor JS-->
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-columns"></i>
    </button>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin') }}">
                            <i class="fas fa-columns"></i> Valdymo skydelis <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('spells.index') }}">
                            <i class="fas fa-magic"></i> Burtažodžiai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('types.index') }}">
                            <i class="fas fa-th"></i> Tipai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fas fa-users"></i> Vartotojai
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
  
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-white">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="text-primary8">Valdymo skydelis</h1>
            </div>
            
            <!-- Page Content -->
            <div class="text-dark">
                @yield('admin_content')
            </div>

        </main>
    </div>
</div>