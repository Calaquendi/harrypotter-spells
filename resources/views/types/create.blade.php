@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Nauja burtažodžių rūšis</h1>

    <form action="{{ route('types.store') }}" method="POST">
        @csrf

        Pavadinimas:
        <br />
        <input type="text" name="name" value="" class="form-control" />

        <br />

        <input type="submit" class="btn btn-primary" value="Išsaugoti" />
    </form>
    <br />
</div>
@endsection