@extends('admin.dashboard')

@section('title', 'Burtažodžio keitimas' )

@section('admin_content')
<div class="container-fluid">

    <h2 class="my-4">Burtažodžio keitimas</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('spells.update', $spell->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group row justify-content-start">
            <label for="name" class="col-sm-2 px-0 col-form-label">Pavadinimas<span class="text-primary3" data-toggle="tooltip" data-placement="top" title="Būtina įrašyti">*</span>:</label>
            <div class="col-sm-10 px-0">
                <input id="name" type="text" name="name" value="{{ $spell->name }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="spell_url" class="col-sm-2 px-0 col-form-label">
            Nuoroda<span class="text-primary3" data-toggle="tooltip" data-placement="top" title="Būtina įrašyti">*</span></i>:
            </label>
            <div class="col-sm-10 px-0 input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">{{ config('app.url')  }}/</div>
                </div>
                <input id="spell_url" type="text" name="spell_url" value="{{ $spell->spell_url }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Be lietuviškų raidžių ir tarpų" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="name" class="col-sm-2 px-0 col-form-label">Paveikslėlis:</label>
            <div class="col-sm-10 px-0">
                @if (!empty($spell->img))
                <img src="{{ asset('storage/'.$spell->img) }}" height="100px">
                <br />
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="delete" name="deleteImg">
                    <label class="form-check-label" for="deleteImg">
                        Ištrinti paveikslėlį?
                    </label>
                </div>
                @endif
                <br />
                <input type="file" name="img" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="name" class="col-sm-2 px-0 col-form-label">Pilnas pavadinimas<span class="text-primary3" data-toggle="tooltip" data-placement="top" title="Būtina įrašyti">*</span>:</label>
            <div class="col-sm-10 px-0">
                <input id="full_name" type="text" name="full_name" value="{{ $spell->full_name }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="type_id" class="col-sm-2 px-0 col-form-label">Tipas:</label>
            <div class="col-sm-10 px-0">
                <select id="type_id" name="type_id" class="form-control">
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" @if ($type->id == $spell->type_id) selected @endif>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="color" class="col-sm-2 px-0 col-form-label">Šviesa:</label>
            <div class="col-sm-10 px-0">
                <input id="color" type="text" name="color" value="{{ $spell->color }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="effect" class="col-sm-2 px-0 col-form-label">Efektas<span class="text-primary3" data-toggle="tooltip" data-placement="top" title="Būtina įrašyti">*</span>:</label>
            <div class="col-sm-10 px-0">
                <input id="effect" type="text" name="effect" value="{{ $spell->effect }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="description" class="col-sm-2 px-0 col-form-label">Aprašymas<span class="text-primary3" data-toggle="tooltip" data-placement="top" title="Būtina įrašyti">*</span>:</label>
            <div class="col-sm-10 px-0">
                <textarea id="description" name="description" class="form-control" rows="7">{{ $spell->description }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="quote" class="col-sm-2 px-0 col-form-label">Citata:</label>
            <div class="col-sm-10 px-0">
                <textarea id="quote" name="quote" class="form-control" rows="4">{{ $spell->quote }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="history" class="col-sm-2 px-0 col-form-label">Istorija:</label>
            <div class="col-sm-10 px-0">
                <textarea id="history" name="history" class="form-control" rows="7">{{ $spell->history }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="effect_full" class="col-sm-2 px-0 col-form-label">Kerėjimas ir poveikis:</label>
            <div class="col-sm-10 px-0">
                <textarea id="effect_full" name="effect_full" class="form-control" rows="7">{{ $spell->effect_full }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="additional_title" class="col-sm-2 px-0 col-form-label">Papildomos skilties pavadinimas:</label>
            <div class="col-sm-10 px-0">
                <input id="additional_title" type="text" name="additional_title" value="{{ $spell->additional_title }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="additional" class="col-sm-2 px-0 col-form-label">Papildoma informacija:</label>
            <div class="col-sm-10 px-0">
                <textarea id="additional" name="additional" class="form-control" rows="7">{{ $spell->additional }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="etymology" class="col-sm-2 px-0 col-form-label">Žodžio kilmė:</label>
            <div class="col-sm-10 px-0">
                <textarea id="etymology" name="etymology" class="form-control" rows="7">{{ $spell->etymology }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <div class="col-sm-10 px-0">
                <input type="submit" class="btn btn-info btn-sm" value="Išsaugoti" />
            </div>
        </div>

    </form>

</div>
@endsection