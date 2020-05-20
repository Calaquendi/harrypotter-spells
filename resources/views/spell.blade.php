@extends('app')

@section('content')
<!-- Page Features -->

@foreach ($spells as $spell)
<h1 class="my-4">{{ $spell->name }}</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div id="spellName">{{ $spell->full_name }}</div>
            <div id="typeName">{{ $spell->type->name }}</div>
            <div id="spellColor">{{ $spell->color }}</div>
            <div id="spellEffect">{{ $spell->effect }}</div>
        </div>
        <div class="col-sm-9">
            <div id="spellDesc">{{ $spell->description }}</div>
            <div>{{ $spell->quote }}</div>
        </div>
        <div class="col-sm-12">
            <div id="spellHistory">{{ $spell->history }}</div>
            <div id="spellEffectFull">{{ $spell->effect_full }}</div>
            <div id="spellEffect">{{ $spell->additional_title }}</div>
            <div id="spellEffect">{{ $spell->additional }}</div>
            <div id="spellEffect">{{ $spell->etymology }}</div>
        </div>
    </div>
</div <!-- /.row -->
@endforeach
@endsection