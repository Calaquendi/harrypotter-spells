@extends('app')

@section('content')

<!-- Jumbotron Header -->
<header class="my-4">
    <h1 class="display-3">Burtažodžiai</h1>
    <p class="lead">„Hario Poterio“ pasaulyje naudojami burtažodžiai</p>
</header>


<!-- Search -->
<div class="row">

    <div class="input-group mb-4">
        <input type="text" class="form-control form-control-lg" placeholder="Burtažodžio paieška" aria-label="Burtažodžio paieška" aria-describedby="button-search" id="input-search">
        <div class="input-group-append">
          <button class="btn btn-outline-light" type="button" id="button-search"><i class="fas fa-search"></i></button>
        </div>
    </div>

</div>
<!-- /.row Search -->

<!-- Page Features -->
<div class="row text-center">

    <blockquote class="blockquote rounded-lg py-5 px-5 mb-4" id="randomQuote">
        <p class="font-italic">
            Ir štai išgirdo atšvilpiant. Atsisukęs išvydo pamiške atskriejant „Žaibą“.
        </p>
    </blockquote>

</div>
<!-- /.row Page Features -->

<!-- Page Stats -->
<div class="row mb-4">
    <div class="col-sm-4 mb-4 mb-sm-0">
        <div class="h1 text-light mb-1">{{ $types->count() }}</div>
        <div class="h5 text-light font-weight-normal opacity-70 mb-2">Tipų burtažodžių</div>
    </div>
    <div class="col-sm-4 mb-4 mb-sm-0">
        <div class="h1 text-light mb-1">{{ $spells->count() }}</div>
        <div class="h5 text-light font-weight-normal opacity-70 mb-1">Burtažodžių</div>
    </div>
    <div class="col-sm-4">
        <div class="h1 text-light mb-1">47</div>
        <div class="h5 text-light font-weight-normal opacity-70 mb-1">Inner Page Templates</div>
    </div>
</div>
<!-- /.row Page Stat -->

<!-- Tipe Carousel -->
<div id="carouselTipes" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        @foreach ($types as $key => $type)
            <div class="carousel-item {{ $key == 0 ? "active" : "" }}">
                <div class="card border-0 w-100 bg-transparent mx-5">
                    <div class="row no-gutters">
                        <div class="card-body text-light">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">{{ $type->name }}</h5>
                                    <p class="card-text">   
                                        {{ $type->description ?? "Aprašymas nesukurtas" }}
                                    </p>
                                </div>
                                <div class="col-6">
                                    @php
                                        $spellList = App\Spell::where('type_id', $type->id)->inRandomOrder()->orderBy('name', 'ASC')->limit(3)->get();    
                                    @endphp
                                    <ul class="list-group list-group-horizontal">
                                        @foreach ($spellList as $spell)
                                            <li class="list-group-item bg-transparent">
                                                <a href="{{ $spell->type->type_url }}/{{ $spell->spell_url }}">{{ $spell->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <a class="carousel-control-prev ml-n5" href="#carouselTipes" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next mr-n5" href="#carouselTipes" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
<!-- /.div Tipe Carousel -->

@endsection