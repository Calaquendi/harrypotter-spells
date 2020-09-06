@extends('app')

@section('content')
<div class="container">
<!-- Page Features -->

<div class="row justify-content-center mb-3">
    <div class="alert alert-info" role="alert">
        @if (count($spells) > 0)
            Pagal jūsų užklausą <span class="badge badge-secondary"><strong class="h6">{{ $search ?? "Nieko neįvedet" }}</strong></span> suradome:
        @else
            Pagal jūsų užklausą <span class="badge badge-secondary"><strong class="h6">{{ $search ?? "Nieko neįvedet" }}</strong></span> nieko suradome:
        @endif
    </div>
</div>

@if ($search != null)
    @foreach ($spells as $spell)
    

    <div class="container">
        <div class="row justify-content-center">
            
                <div class="card bg-primary4 shadow mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="{{ asset('storage/'.$spell->img) }}" class="card-img" alt="{{ $spell->name }}">
                        </div>
                        <div class="col-md-8 align-self-center text-center">
                            <h5 class="card-title display-4 text-primary2 font-trajan">{{ $spell->name }}</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body bg-primary1 px-0 text-center">
                                <div class="row justify-content-center">
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item bg-transparent border-0"><span id="typeName"><span class="lead text-primary2 text-uppercase">Tipas:</span> <strong>{{ $spell->type->name }}</strong></span></li>
                                    <li class="list-group-item bg-transparent border-0"><span id="spellColor"><span class="lead text-primary2 text-uppercase">Šviesa:</span> <strong>{{ $spell->color }}</strong></span></li>
                                    <li class="list-group-item bg-transparent border-0"><span id="spellEffect"><span class="lead text-primary2 text-uppercase">Efektas:</span> <strong>{{ $spell->effect }}</strong></span></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <a href="{{ asset ($spell->type->type_url .'/'. $spell->spell_url) }}" class="stretched-link"></a>
                    </div>
                </div>
            
            <!--
                <h1 class="display-4 my-4 text-center" id="spellTitle">{{ $spell->name }}</h1>
            <div class="col-sm-3">
                <div id="spellName" class="badge badge-primary mb-2">{{ $spell->full_name }}</div>
                <div id="typeName"><span class="lead text-primary2 text-uppercase">Tipas:</span> <strong>{{ $spell->type->name }}</strong></div>
                <div id="spellColor"><span class="lead text-primary2 text-uppercase">Šviesa:</span> <strong>{{ $spell->color }}</strong></div>
                <div id="spellEffect"><span class="lead text-primary2 text-uppercase">Efektas:</span> <strong>{{ $spell->effect }}</strong></div>
            </div>
            <div class="col-sm-9">
                <h3 class="spellBlockTitle">Aprašymas</h3>
                <div id="spellDesc">{{ $spell->description }}</div>
                <blockquote class="blockquote">
                    <p class="mb-0 mt-4 font-italic font-weight-light">{{ $spell->quote }}</p>
                </blockquote>
            </div>
            <div class="col-sm-12">
                @if( !empty($spell->history))
                <h3 class="spellBlockTitle">Istorija</h3>
                <div class="spellInfo">{{ $spell->history }}</div>
                @endif
                @if( !empty($spell->effect_full))
                <h3 class="spellBlockTitle">Kerėjimas ir poveikis</h3>
                <div class="spellInfo">{{ $spell->effect_full }}</div>
                @endif
                @if( !empty($spell->additional))
                <h3 class="spellBlockTitle">{{ $spell->additional_title }}</h3>
                <div class="spellInfo">{!! $spell->additional !!}</div>
                @endif
                @if( !empty($spell->etymology))
                <h3 class="spellBlockTitle">Žodžio kilmė</h3>
                <div class="spellInfo">{{ $spell->etymology }}</div>
                @endif
            </div>
            -->
        </div>
    </div <!-- /.row -->
    @endforeach
@endif
</div>
@endsection