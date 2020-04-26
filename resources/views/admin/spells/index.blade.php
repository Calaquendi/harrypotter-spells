@extends('app')

@section('content')
<div class="col-lg-12">

    <h1 class="my-4">Burtažodžiai</h1>

    <a href="{{ route('spells.create') }}" class="btn btn-info">Naujas burtažodis</a>
    <br /><br />

    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th></th>
                @foreach ($spells as $spell)
            <tr>
                <td>{{ $spell->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('spells.edit', $spell->id) }}">Keisti</a>

                    <form action="{{ route('spells.destroy', $spell->id) }}" method="POST" style="display: inline">
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