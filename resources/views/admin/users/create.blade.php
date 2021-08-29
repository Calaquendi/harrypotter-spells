@extends('admin.dashboard')

@section('title', 'Naujas vartotojas' )

@section('admin_content')
<div class="container-fluid">

    <h2 class="my-4">Naujas vartotojas</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group row justify-content-start">
            <label for="name" class="col-sm-2 px-0 col-form-label">Vardas:</label>
            <div class="col-sm-10 px-0">
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="email" class="col-sm-2 px-0 col-form-label">El. paštas:</label>
            <div class="col-sm-10 px-0">
                <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control" />
            </div>
        </div>

        <div class="form-group row justify-content-start">
            <label for="password" class="col-sm-2 px-0 col-form-label">Slaptažodis:</label>
            <div class="col-sm-10 px-0">
                <input id="password" type="password" name="password" value="{{ old('password') }}" class="form-control" />
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