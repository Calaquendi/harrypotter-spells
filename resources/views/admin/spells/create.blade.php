@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4 text-center">Naujas burtažodis</h1>

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

        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form-label">Pavadinimas:</label>
            <div class="col-sm-6">
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="spell_url" class="col-sm-2 col-form-label">
                Nuoroda (be LT raidžių ir tarpų):
                <br />
                <span class="badge badge-dark">{{ config('app.url')  }}/</span>
            </label>
            <div class="col-sm-6">
                <input id="spell_url" type="text" name="spell_url" value="{{ old('spell_url') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="full_name" class="col-sm-2 col-form-label">Pilnas pavadinimas:</label>
            <div class="col-sm-6">
                <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="type_id" class="col-sm-2 col-form-label">Tipas:</label>
            <div class="col-sm-6">
                <select id="type_id" name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id == old('type_id')) selected @endif>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="color" class="col-sm-2 col-form-label">Šviesa:</label>
            <div class="col-sm-6">
                <input id="color" type="text" name="color" value="{{ old('color') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="effect" class="col-sm-2 col-form-label">Efektas:</label>
            <div class="col-sm-6">
                <input id="effect" type="text" name="effect" value="{{ old('effect') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="description" class="col-sm-2 col-form-label">Aprašymas:</label>
            <div class="col-sm-6">
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="quote" class="col-sm-2 col-form-label">Citata:</label>
            <div class="col-sm-6">
                <textarea id="quote" name="quote" class="form-control">{{ old('quote') }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="history" class="col-sm-2 col-form-label">Istorija:</label>
            <div class="col-sm-6">
                <textarea id="history" name="history" class="form-control">{{ old('history') }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="effect_full" class="col-sm-2 col-form-label">Kerėjimas ir poveikis:</label>
            <div class="col-sm-6">
                <textarea name="effect_full" class="form-control">{{ old('effect_full') }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="additional_title" class="col-sm-2 col-form-label">Papildomos skilties pavadinimas:</label>
            <div class="col-sm-6">
                <input id="additional_title" type="text" name="additional_title" value="{{ old('additional_title') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="additional" class="col-sm-2 col-form-label">Papildoma informacija:</label>
            <div class="col-sm-6">
                <textarea id="additional" name="additional" class="form-control">{{ old('additional') }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="etymology" class="col-sm-2 col-form-label">Žodžio kilmė:</label>
            <div class="col-sm-6">
                <textarea id="etymology" name="etymology" class="form-control">{{ old('etymology') }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-sm-8">
                <input type="submit" class="btn btn-info" value="Išsaugoti" />
            </div>
        </div>

    </form>
    <br />
</div>
@endsection