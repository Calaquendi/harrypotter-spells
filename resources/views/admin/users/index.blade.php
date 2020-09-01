@extends('app')

@section('content')
<div class="container">

<div class="col-lg-12">

    <h1 class="my-4">Vartotojai</h1>

    <a href="{{ route('users.create') }}" class="btn btn-info">Naujas vartotojas</a>
    <br /><br />

    <table class="table table-dark bg-primary4">
        <thead>
            <tr>
                <th>#</th>
                <th>Vardas</th>
                <th>El. paštas</th>
                <th>Registracijos data</th>
                <th></th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Keisti</a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Trinti" class="btn btn-danger" onclick="return confirm('Ar tikrai?')"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
</div>

</div>
@endsection