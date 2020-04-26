@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Burtažodžių rūšys</h1>

    <a href="{{ route('types.create') }}" class="btn btn-info">Nauja burtažodžių rūšis</a>
    <br /><br />

    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th></th>
                @foreach ($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('types.edit', $type->id) }}">Keisti</a>

                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Trinti" class="btn btn-danger" onclick="return confirm('Ar tikrai?')"/>
                    </form>
                </td>
            </tr>
            @endforeach
            </tr>
        </thead>
    </table>
</div>
@endsection