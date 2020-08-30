@extends('app')

@section('content')
<!-- Page Features -->

<div class="row justify-content-center mb-3">
    <div class="alert alert-info" role="alert">
        @if (count($spells) > 0)
            Pagal jūsų užklausą <span class="badge badge-secondary"><strong class="h6">{{ $search ?? "Viskas" }}</strong></span> suradome:
        @else
            Pagal jūsų užklausą <span class="badge badge-secondary"><strong class="h6">{{ $search ?? "Viskas" }}</strong></span> nieko suradome:
        @endif
    </div>
</div>

@foreach ($spells as $spell)
<h1 class="display-4 my-4 text-center" id="spellTitle">{{ $spell->name }}</h1>

<div class="container">
    <div class="row">
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
    </div>
</div <!-- /.row -->
@endforeach
@endsection