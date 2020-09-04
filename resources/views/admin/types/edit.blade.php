@extends('admin.dashboard')

@section('admin_content')
<div class="container">

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

            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label">Pavadinimas:</label>
                <div class="col-sm-6">
                    <input id="name" type="text" name="name" value="{{ $type->name }}" class="form-control" />
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="parent" class="col-sm-2 col-form-label">
                    Nuoroda (be LT raidžių ir tarpų):
                    <br />
                    <span class="badge badge-dark">{{ config('app.url')  }}/</span>
                </label>
                <div class="col-sm-6">
                    <select id="parent" name="parent" class="form-control">
                        <option value="0" {{ $type->parent == $type->parent ? 'selected' : '' }}>0</option>
                        @if ($types->count() > 0)
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $type->parent == $type->id ? 'selected' : '' }} >{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-info" value="Išsaugoti" />
                </div>
            </div>

        </form>

    </div>

</div>
@endsection