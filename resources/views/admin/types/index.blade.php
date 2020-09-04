@extends('admin.dashboard')

@section('admin_content')
<div class="container">

    <div class="col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="my-4">Burtažodžių rūšys</h1>
            <a href="{{ route('types.create') }}" class="btn btn-info">Nauja burtažodžių rūšis</a>
        </div>

        <table class="table table-dark bg-primary4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Parent #</th>
                    <th></th>
                    @foreach ($types as $type)
                </tr>
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->parent }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('types.edit', $type->id) }}">Keisti</a>

                        <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display: inline">
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