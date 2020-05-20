@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Naujas burtažodis</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('spells.store') }}" method="POST">
        @csrf

        Pavadinimas:
        <br />
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
        <br />
        Nuoroda (be LT raidžių ir tarpų):
        <br />
        {{ config('app.url')  }}/<input type="text" name="spell_url" value="{{ old('spell_url') }}" class="form-control" />
        Pilnas pavadinimas:
        <br />
        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" />
        Tipas:
            <br />
            <select name="type_id" class="form-control">
                @foreach($types as $type)
                    <option value="{{ $type->id }}" @if ($type->id == old('type_id')) selected @endif>{{ $type->name }}</option>
                @endforeach
            </select>
        <br />
        Šviesa:
        <br />
        <input type="text" name="color" value="{{ old('color') }}" class="form-control" />
        <br />
        Efektas:
        <br />
        <input type="text" name="effect" value="{{ old('effect') }}" class="form-control" />
        <br />
        Aprašymas:
        <br />
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        <br />
        Citata:
        <br />
        <textarea name="quote" class="form-control">{{ old('quote') }}</textarea>
        <br />
        Istorija:
        <br />
        <textarea name="history" class="form-control">{{ old('history') }}</textarea>
        <br />
        Kerėjimas ir poveikis:
        <br />
        <textarea name="effect_full" class="form-control">{{ old('effect_full') }}</textarea>
        <br />
        Papildomos skilties pavadinimas:
        <br />
        <input type="text" name="additional_title" value="{{ old('additional_title') }}" class="form-control" />
        <br />
        Papildoma informacija:
        <br />
        <textarea name="additional" class="form-control">{{ old('additional') }}</textarea>
        <br />
        Žodžio kilmė:
        <br />
        <textarea name="etymology" class="form-control">{{ old('etymology') }}</textarea>
        <br />

        <br />

        <input type="submit" class="btn btn-primary" value="Išsaugoti" />
    </form>
    <br />
</div>
@endsection