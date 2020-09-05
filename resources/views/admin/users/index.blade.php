@extends('admin.dashboard')

@section('admin_content')
<div class="container">

    <div class="col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="my-4">Vartotojai</h1>
            <a href="{{ route('users.create') }}" class="btn btn-info btn-sm">Naujas vartotojas</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="bg-primary5">
                    <tr>
                        <th>#</th>
                        <th>Vardas</th>
                        <th>El. paštas</th>
                        <th>Registracijos data</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Keisti</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Trinti" class="btn btn-danger btn-sm" onclick="return confirm('Ar tikrai?')"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection