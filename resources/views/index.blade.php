@extends('app')

<div class="d-none d-md-block" style="transform: scale(1.2); position: fixed; top: -10rem;">
    <div id="parallax-scene">
        <div data-depth="0.04"><img src="{{ asset('img/parallax/parallax-bg-1.png') }}"></div>
        <div data-depth="0.06"><img src="{{ asset('img/parallax/parallax-bg-2.png') }}"></div>
        <div data-depth="0.09"><img src="{{ asset('img/parallax/parallax-bg-3.png') }}"></div>
        <div data-depth="0.2"><img src="{{ asset('img/parallax/parallax-bg-4.png') }}"></div>
        <div data-depth="0.4"><img src="{{ asset('img/parallax/parallax-bg-5.png') }}"></div>
    </div>
</div>

@section('content')
<div class="container">
    <!-- Jumbotron Header -->

    <header class="input-group my-4 justify-content-center d-none d-md-block">
        <p class="lead input-group justify-content-center">„Hario Poterio“ pasaulyje naudojami</p>
        <h1 class="display-3 text-uppercase input-group justify-content-center">Burtažodžiai</h1>
    </header>
    <header class="input-group my-4 justify-content-center d-md-none">
        <p class="lead input-group justify-content-center">„Hario Poterio“ pasaulyje naudojami</p>
        <h1 class="display-4 text-uppercase input-group justify-content-center">Burtažodžiai</h1>
    </header>

    <div style="margin-top:15vh;">
        <!-- Search -->
        {!! Form::open(array('url' => 'search', 'files' => true)) !!}
        {{ csrf_field() }}
        <div class="row align-items-center">
            <div class="input-group mb-4">
                <input id="input-search" name="search" type="text" class="form-control form-control-lg" placeholder="Burtažodžio paieška" aria-label="Burtažodžio paieška" aria-describedby="button-search">
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