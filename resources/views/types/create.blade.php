@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Nauja burtažodžių rūšis</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('types.store') }}" method="POST">
        @csrf

        Pavadinimas:
        <br />
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" />

        <br />

        <input type="submit" class="btn btn-primary" value="Išsaugoti" />
    </form>
    <br />
</div>
@endsection