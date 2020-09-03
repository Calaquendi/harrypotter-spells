@extends('app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
-->
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary1 sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin') }}">
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('spells.index') }}">
                            Burtažodžiai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('types.index') }}">
                            Tipai
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
  
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-primary4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <!--
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-light">Share</button>
                        <button type="button" class="btn btn-sm btn-light">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        This week
                    </button>
                </div>
                -->
            </div>
            @php
                $countTypes = 0;
            @endphp
            @foreach ($types as $type)
                @if ($type->parent == 0)
                    @php
                        $countTypes++;
                    @endphp
                @endif
            @endforeach
            <div class="lead mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item" aria-current="page"><span class="badge badge-light">{{ $countTypes }}</span> Tipai</li>
                        <li class="breadcrumb-item" aria-current="page"><span class="badge badge-light">{{ $spells->count() }}</span> Burtažodžiai</li>
                        <li class="breadcrumb-item" aria-current="page"><span class="badge badge-light">{{ $users->count() }}</span> Vartotojai</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                
                @php
                    $parents = array(); 
                @endphp
                @foreach ($types as $type)
                    @php
                        if ($type->parent != 0) {
                            array_push($parents, $type->parent);
                        }
                    @endphp
                @endforeach
                
                @foreach ($types as $type)
                    @if (!in_array($type->id, $parents))
                        @php
                            $spell_types = 0;
                        @endphp
                        @foreach ($spells as $spell)
                            @if ($spell->type_id == $type->id)
                                @php
                                    $spell_types++;
                                @endphp
                            @endif
                        @endforeach

                        <div class="card text-dark mb-3 mx-3" style="max-width: 18rem;">
                            <div class="card-header font-trajan bg-primary5">{{ $type->name }}</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $spell_types }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="lead mb-3">Title</div>
            <div class="row">
                Content
            </div>
        </main>
    </div>
</div>

@endsection