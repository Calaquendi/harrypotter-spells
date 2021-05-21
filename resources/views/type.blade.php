@extends('app')

@section('content')
<div class="container">
<!-- Page Features -->

<h1 class="my-4">{{ $typeName }}</h1>

<div class="container">
    @if (count($azList) > 0)
    <div class="row justify-content-end mb-3">
        <nav aria-label="breadcrumb" class="position-fixed">
            <ol class="breadcrumb py-1">
                @foreach ($azList as $az)
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="#azIndex-{{ $az }}">{{ $az }}</a>
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
    @endif
   
    <div class="row mb-3">
        <ul id="typeList" class="list-unstyled">
            @php
                $azInd = null;
            @endphp
            @foreach ($spellList as $spell)
                @php
                    if($azInd != $spell->name[0]) {
                        echo '<button type="button" class="btn btn-sm btn-light ml-n5 mt-4" id="azIndex-'. $spell->name[0] .'">'. $spell->name[0] .'</button>';
                        $azInd = $spell->name[0];
                    }
                @endphp
                <li class="lead"><a href="{{ $spell->type->type_url }}/{{ $spell->spell_url }}" title="{{ $spell->name }}">{{ $spell->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div <!-- /.row -->

</div>
@endsection