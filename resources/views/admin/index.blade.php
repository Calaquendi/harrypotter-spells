@extends('admin.dashboard')

@section('admin_content')
  
    @php
        $countTypes = 0;
    @endphp
    @foreach ($types as $type)
        @if ($type->parent == 0)
            @php
                $countTypes++;
            @endphp
        @endif
    @endforeach
    <div class="lead mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent text-primary6">
                <li class="breadcrumb-item" aria-current="page"><span class="badge bg-primary6 text-dark">{{ $countTypes }}</span> Tipai</li>
                <li class="breadcrumb-item" aria-current="page"><span class="badge bg-primary6 text-dark">{{ $spells->count() }}</span> Burtažodžiai</li>
                <li class="breadcrumb-item" aria-current="page"><span class="badge bg-primary6 text-dark">{{ $users->count() }}</span> Vartotojai</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        
        @php
            $parents = array(); 
        @endphp
        @foreach ($types as $type)
            @php
                if ($type->parent != 0) {
                    array_push($parents, $type->parent);
                }
            @endphp
        @endforeach
        
        @foreach ($types as $type)
            @if (!in_array($type->id, $parents))
                @php
                    $spell_types = 0;
                @endphp
                @foreach ($spells as $spell)
                    @if ($spell->type_id == $type->id)
                        @php
                            $spell_types++;
                        @endphp
                    @endif
                @endforeach

                <div class="card text-dark mb-3 mx-3" style="max-width: 18rem;">
                    <div class="card-header font-trajan bg-primary6">{{ $type->name }}</div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $spell_types }}</h5>
                    </div>
                </div>
            @endif
        @endforeach

    </div>

@endsection