@extends('app')

<div class="bg-main"></div>

@section('content')
<div class="container">
    <!-- Jumbotron Header -->

    <header class="input-group my-4 justify-content-center d-none d-md-block">
        <p class="lead input-group justify-content-center">Hario Poterio pasaulyje naudojami</p>
        <h1 class="display-3 text-uppercase input-group justify-content-center">burtažodžiai</h1>
    </header>
    <header class="input-group my-4 justify-content-center d-md-none">
        <p class="lead input-group justify-content-center">Hario Poterio pasaulyje naudojami</p>
        <h1 class="display-4 text-uppercase input-group justify-content-center" id="main-title">burtažodžiai</h1>
    </header>

    <div style="margin-top:3vh;">
        <!-- Search -->
        {!! Form::open(array('url' => 'search', 'files' => true)) !!}
        {{ csrf_field() }}
        <div class="row align-items-center">
            <div class="input-group mb-4 mx-2">
                <input id="input-search" name="search" type="text" class="form-control form-control-lg" placeholder="Kokio burtažodžio ieškai?" aria-label="Burtažodžio paieška" aria-describedby="button-search" autocomplete="off">
                <div class="input-group-append">
                    <button id="button-search" type="submit" class="btn btn-outline-light"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <!-- /.row Search -->
    </div>

</div>
@endsection