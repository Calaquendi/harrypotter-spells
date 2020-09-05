@extends('admin.dashboard')

@section('admin_content')
<div class="container">
    
    <div class="col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="my-4">Burtažodžiai</h1>
            <a href="{{ route('spells.create') }}" class="btn btn-info btn-sm">Naujas burtažodis</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="bg-primary5">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Tipas</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($spells as $spell)
                    <tr scope="row">
                        <td>{{ $spell->id }}</td>
                        <td>{{ $spell->name }}</td>
                        <td>{{ $spell->type->name }}</td>
                        <td class="text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('spells.edit', $spell->id) }}">Keisti</a>

                            <form action="{{ route('spells.destroy', $spell->id) }}" method="POST" style="display: inline">
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