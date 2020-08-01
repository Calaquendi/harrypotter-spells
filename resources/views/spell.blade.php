@extends('app')

@section('content')
<!-- Page Features -->

@foreach ($spells as $spell)
<h1 class="my-4 text-center" id="spellTitle">{{ $spell->name }}</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div id="spellName" class="badge badge-primary mb-2">{{ $spell->full_name }}</div>
            <div class="list-group">
            <div id="typeName" class="list-group-item list-group-item-action list-group-item-dark"><strong>Tipas:</strong> {{ $spell->type->name }}</div>
            <div id="spellColor" class="list-group-item list-group-item-action list-group-item-dark"><strong>Šviesa:</strong> {{ $spell->color }}</div>
            <div id="spellEffect" class="list-group-item list-group-item-action list-group-item-dark"><strong>Efektas:</strong> {{ $spell->effect }}</div>
</div>
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