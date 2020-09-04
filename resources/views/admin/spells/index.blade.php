@extends('admin.dashboard')

@section('admin_content')
<div class="container">
    
    <div class="col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="my-4">Burtažodžiai</h1>
            <a href="{{ route('spells.create') }}" class="btn btn-info">Naujas burtažodis</a>
        </div>

        <table class="table table-dark bg-primary4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pavadinimas</th>
                    <th scope="col">Tipas</th>
                    <th scope="col"></th>
                </tr>
                @foreach ($spells as $spell)
                    <tr scope="row">
                        <td>{{ $spell->id }}</td>
                        <td>{{ $spell->name }}</td>
                        <td>{{ $spell->type->name }}</td>
                        <td class="text-right">
                            <a class="btn btn-primary" href="{{ route('spells.edit', $spell->id) }}">Keisti</a>

                            <form action="{{ route('spells.destroy', $spell->id) }}" method="POST" style="display: inline">
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