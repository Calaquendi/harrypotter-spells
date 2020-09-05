@extends('admin.dashboard')

@section('admin_content')
<div class="container">

    <div class="col-lg-12">

        <h1 class="my-4 text-center">Vartotojo redagavimas</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group row justify-content-center">
                <label for="name" class="col-sm-2 col-form-label">Vardas:</label>
                <div class="col-sm-6">
                    <input id="name" type="text" name="name" value="{{ $user->name }}" class="form-control" />
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="email" class="col-sm-2 col-form-label">El. paštas:</label>
                <div class="col-sm-6">
                    <input id="email" type="text" name="email" value="{{ $user->email }}" class="form-control" />
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="password" class="col-sm-2 col-form-label">Slaptažodis:</label>
                <div class="col-sm-6">
                    <input id="password" type="password" name="password" value="{{ $user->password }}" class="form-control" />
                </div>
            </div>
            
            <div class="form-group row justify-content-center">
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-info btn-sm" value="Išsaugoti" />
                </div>
            </div>

        </form>
        <br />
    </div>

</div>
@endsection