@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Burtažodžių rūšies keitimas</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('types.update', $type->id) }}" method="POST">
        @method('PUT')
        @csrf

        Pavadinimas:
        <br />
        <input type="text" name="name" value="{{ $type->name }}" class="form-control" />
        <br />
        Nuoroda (be LT raidžių ir tarpų):
        <br />
        {{ config('app.url')  }}/<input type="text" name="type_url" value="{{ $type->type_url }}" class="form-control" />

        <br />

        <input type="submit" class="btn btn-primary" value="Išsaugoti" />
    </form>
    <br />
</div>
@endsection