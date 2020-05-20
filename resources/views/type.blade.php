@extends('app')

@section('content')
<!-- Page Features -->


<h1 class="my-4">{{ $typeName }}</h1>

<div class="container">
    <div class="row">
        @foreach ($spellList as $spell)
        <ul><li><a href="{{ $spell->type->type_url }}/{{ $spell->spell_url }}">{{ $spell->name }}</a></li></ul>
        @endforeach
    </div>
</div <!-- /.row -->

@endsection