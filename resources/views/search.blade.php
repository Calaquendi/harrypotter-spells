@extends('app')

@section('content')
<div class="container">

<div class="row justify-content-center mb-3">
    <div class="alert alert-info" role="alert">
        @if (count($spells) > 0)
            @section('title', 'Paieškos rezultatai' )
            Įvestą paieškos kriterijų <span class="badge badge-secondary"><strong class="h6">{{ $search }}</strong></span> atitinkantys burtažodžiai:
        @else
            @section('title', 'Nieko nerasta' )
            Nieko neįvedei į paiešką, todėl burtažodžio nepavyko rasti.  
        @endif
    </div>
</div>
<div class="row justify-content-center mb-3">
    @if (count($spells) == 0)
        <img src="{{asset('/img/sad_harry.gif')}}">
    @endif
</div>

@if ($search != null)
    @foreach ($spells as $spell)
    

    <div class="container">
        <div class="row justify-content-center">
            
                <div class="card bg-primary4 shadow mb-3">
                    <div class="row no-gutters">
                        @if(!empty($spell->img))
                            <div class="col-md-8 align-self-center text-center">
                                <h5 class="card-title display-4 text-primary2 font-trajan">{{ $spell->name }}</h5>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('storage/'.$spell->img) }}" class="card-img" alt="{{ $spell->name }}">
                            </div>
                        @else
                            <div class="col-md-12 align-self-center text-center">
                                <h5 class="card-title display-4 text-primary2 font-trajan">{{ $spell->name }}</h5>
                            </div>
                        @endif
                        
                        <div class="col-md-12">
                            <div class="card-body bg-primary1 px-0 text-center">
                                <div class="row justify-content-center">
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item bg-transparent border-0"><span id="typeName"><span class="lead text-primary2 text-uppercase">Tipas:</span> <strong>{{ $spell->type->name }}</strong></span></li>
                                        <li class="list-group-item bg-transparent border-0"><span id="spellColor"><span class="lead text-primary2 text-uppercase">Šviesa:</span> <strong>{{ $spell->color }}</strong></span></li>
                                        <li class="list-group-item bg-transparent border-0"><span id="spellEffect"><span class="lead text-primary2 text-uppercase">Efektas:</span> <strong>{{ $spell->effect }}</strong></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <a href="{{ asset ($spell->type->type_url .'/'. $spell->spell_url) }}" class="stretched-link"></a>
                    <div class="row justify-content-center bg-primary1 m-0">
                    <hr class="bg-dark w-25 m-0"/>
                    </div>
                    <button class="btn bg-primary1 text-primary3 font-weight-bold font-trajan rounded-0">Skaityti pilną aprašymą</button>
                </div>
        </div>
    </div <!-- /.row -->
    @endforeach
@endif
</div>
@endsection