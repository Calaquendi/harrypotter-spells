@extends('app')

@section('content')
<div class="container">
<!-- Page Features -->

    @if($spells->count() > 0)
        @foreach ($spells as $spell)
        <h1 class="display-4 my-4 text-center" id="spellTitle">{{ $spell->name }}</h1>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @if(!empty($spell->img))
                        <img src="{{ asset('storage/'.$spell->img) }}" class="card-img rounded-top" title="{{ $spell->name }}">
                    @endif
                    <div id="spellName" class="badge badge-primary mb-2 btn">{{ $spell->full_name }}</div>
                    <div id="typeName"><span class="lead text-primary2 text-uppercase">Tipas:</span> <strong>{{ $spell->type->name }}</strong></div>
                    <div id="spellColor"><span class="lead text-primary2 text-uppercase">Šviesa:</span> <strong>{{ $spell->color }}</strong></div>
                    <div id="spellEffect"><span class="lead text-primary2 text-uppercase">Efektas:</span> <strong>{{ $spell->effect }}</strong></div>
                </div>
                <div class="col-sm-9">
                    <h3 class="spellBlockTitle">Aprašymas</h3>
                    <div id="spellDesc">{!! $spell->description !!}</div>

                    @if(!empty($spell->quote))
                        <div class="mt-5">
                            <div class="quote-left"><i class="fas fa-quote-left"></i></div>
                            <blockquote class="blockquote">
                                <p class="mb-0 mt-4 font-italic font-weight-light">{!! $spell->quote !!}</p>
                            </blockquote>
                        </div>
                    @endif

                </div>
                <hr>
                <div class="col-sm-12 mt-3">
                    @if(!empty($spell->history))
                        <h3 class="spellBlockTitle">Istorija</h3>
                        <div class="spellInfo">{!! $spell->history !!}</div>
                    @endif
                    @if(!empty($spell->effect_full))
                        <h3 class="spellBlockTitle">Kerėjimas ir poveikis</h3>
                        <div class="spellInfo">{!! $spell->effect_full !!}</div>
                    @endif
                    @if(!empty($spell->additional))
                        <h3 class="spellBlockTitle">{{ $spell->additional_title }}</h3>
                        <div class="spellInfo">{!! $spell->additional !!}</div>
                    @endif
                    @if(!empty($spell->etymology))
                        <h3 class="spellBlockTitle">Žodžio kilmė</h3>
                        <div class="spellInfo">{!! $spell->etymology !!}</div>
                    @endif
                </div>
            </div>
        </div <!-- /.row -->
        @endforeach
    @endif
</div>
@endsection