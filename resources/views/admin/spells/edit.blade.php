@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Burtažodžio keitimas</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('spells.update', $spell->id) }}" method="POST">
        @method('PUT')
        @csrf

        Pavadinimas:
        <br />
        <input type="text" name="name" value="{{ $spell->name }}" class="form-control" />
        <br />
        Pilnas pavadinimas:
        <br />
        <input type="text" name="full_name" value="{{ $spell->full_name }}" class="form-control" />
        <br />
        Tipas:
        <br />
        <select name="type" class="form-control">
            @foreach($types as $type)
            <option value="{{ $type->type_id }}" @if ($type->type_id == $spell->type) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
        <br />
        Šviesa:
        <br />
        <input type="text" name="color" value="{{ $spell->color }}" class="form-control" />
        <br />
        Efektas:
        <br />
        <input type="text" name="effect" value="{{ $spell->effect }}" class="form-control" />
        <br />
        Aprašymas:
        <br />
        <textarea name="description" class="form-control">{{ $spell->description }}</textarea>
        <br />
        Citata:
        <br />
        <textarea name="quote" class="form-control">{{ $spell->quote }}</textarea>
        <br />
        Istorija:
        <br />
        <textarea name="history" class="form-control">{{ $spell->history }}</textarea>
        <br />
        Kerėjimas ir poveikis:
        <br />
        <textarea name="effect_full" class="form-control">{{ $spell->effect_full }}</textarea>
        <br />
        Papildomos skilties pavadinimas:
        <br />
        <input type="text" name="additional_title" value="{{ $spell->additional_title }}" class="form-control" />
        <br />
        Papildoma informacija:
        <br />
        <textarea name="additional" class="form-control">{{ $spell->additional }}</textarea>
        <br />
        Žodžio kilmė:
        <br />
        <textarea name="etymology" class="form-control">{{ $spell->etymology }}</textarea>
        <br />

        <br />

        <input type="submit" class="btn btn-primary" value="Išsaugoti" />
    </form>
    <br />
</div>
@endsection