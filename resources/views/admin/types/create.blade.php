@extends('admin.dashboard')

@section('admin_content')
<div class="container">

    <div class="col-lg-12">

        <h1 class="my-4 text-center">Nauja burtažodžių rūšis</h1>

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
            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label">Pavadinimas:</label>
                <div class="col-sm-6">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" />
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label">
                    Nuoroda (be LT raidžių ir tarpų):
                    <br />
                    <span class="badge badge-dark">{{ config('app.url')  }}/</span>
                </label>
                <div class="col-sm-6">
                    <input id="type_url" type="text" name="type_url" value="{{ old('type_url') }}" class="form-control" />
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label">Parent:</label>
                <div class="col-sm-6">
                    <select id="parent" name="parent" class="form-control">
                        <option value="0" selected>0</option>
                        @if ($types->count() > 0)
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-info btn-sm" value="Išsaugoti" />
                </div>
            </div>
            
        </form>

    </div>

</div>
@endsection