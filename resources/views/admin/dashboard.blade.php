@extends('app')

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
                            <i class="fas fa-columns"></i> Dashboard <span class="sr-only">(current)</span>
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
                <h1 class="h2 text-primary8">Dashboard</h1>
            </div>
            
            <!-- Page Content -->
            @yield('admin_content')

        </main>
    </div>
</div>