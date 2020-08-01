@extends('app')

@section('content')
<!-- Page Features -->


<h1 class="my-4">{{ $typeName }}</h1>

<div class="container">
    <div class="row">
        <ul class="list-unstyled">
            @foreach ($spellList as $spell)
            <li><a href="{{ $spell->type->type_url }}/{{ $spell->spell_url }}">{{ $spell->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div <!-- /.row -->

@endsection