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
            <ol class="breadcrumb bg-transparent text-primary1">
                <li class="breadcrumb-item" aria-current="page"><span class="badge bg-info text-light">{{ $countTypes }}</span> Tipai</li>
                <li class="breadcrumb-item" aria-current="page"><span class="badge bg-info text-light">{{ $spells->count() }}</span> Burtažodžiai</li>
                <li class="breadcrumb-item" aria-current="page"><span class="badge bg-info text-light">{{ $users->count() }}</span> Vartotojai</li>
            </ol>
        </nav>
    </div> <!-- .lead mb-3 End -->

    <hr>

    @if ($types->count() > 0)
        <div class="lead mb-3">Burtažodžių tipai</div>
        <div class="row mx-0">

            <div class="col-md-4">
                @php
                    $parents = array();
                    $typeNames = array();
                    $spellCounts = array();
                @endphp
                @foreach ($types as $type)
                    @php
                        if ($type->parent != 0) {
                            array_push($parents, $type->parent);
                        }
                    @endphp
                @endforeach
                
                <ul class="list-group">
                @foreach ($types as $type)
                    @if (!in_array($type->id, $parents))
                        @php
                            $spell_types_count = 0;
                            array_push($typeNames, $type->name);
                        @endphp
                        @foreach ($spells as $spell)
                            @if ($spell->type_id == $type->id)
                                @php
                                    $spell_types_count++;
                                @endphp
                            @endif
                        @endforeach
                        @php
                            array_push($spellCounts, $spell_types_count);   
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action font-trajan">
                            {{ $type->name }}
                            <span class="badge badge-info ml-5">{{ $spell_types_count }}</span>
                        </li>
                    @endif
                @endforeach
                </ul>
            </div>
            
            @if (count($typeNames) > 0 && count($spellCounts) > 0)
                <div class="col-md-4">
                    <canvas id="typesChart" width="500" height="310"></canvas>
                    <script>
                        var colors = [
                            '#E1B689',
                            '#bd524c',
                            '#93B7BE',
                            '#7c6880',
                            '#3A3C55',
                            '#383c72'
                        ];
                        var xAxisLabelMinWidth = 15;
                        var ctx = document.getElementById('typesChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'horizontalBar',

                            // The data for our dataset
                            data: {
                                labels: {!! json_encode($typeNames) !!},
                                datasets: [{
                                    label: 'Burtažodžių tipai',
                                    backgroundColor: colors,
                                    borderColor: colors,
                                    borderWidth: 1,
                                    data: {!! json_encode($spellCounts) !!}
                                }]
                            },

                            // Configuration options go here
                            options: {
                                responsive: true,
                                legend: {
                                    display: false
                                },
                                scales: {
                                    xAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            stepSize: 1
                                        }
                                    }]
                                }
                            }
                        });
                        function fitChart(){
                            var chartCanvas = document.getElementById('typesChart');
                            var maxWidth = chartCanvas.parentElement.parentElement.clientWidth;
                            var width = Math.max(chart.data.labels.length * xAxisLabelMinWidth, maxWidth);

                            chartCanvas.parentElement.style.width = width +'px';
                        }
                        fitChart();
                    </script>
                </div>
            @endif
        </div> <!-- .row mx-0 END -->
        <hr>
    @endif

    @if ($log_spells_top->count() > 0)
        <div class="row mx-0">
            <div class="col-md-6">
                <div class="lead mb-3">TOP 10 aplankomų burtažodžių</div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="bg-primary5">
                            <tr>
                                <th>Burtažodis</th>
                                <th>Apsilankymai</th>
                            </tr>
                        </thead>
                        @php
                            $spellNames = array();
                            $spellCounts = array();
                        @endphp
                        @foreach ($log_spells_top as $log_spell)
                            @php
                                array_push($spellNames, $log_spell->spell->name);
                                array_push($spellCounts, $log_spell->visits); 
                            @endphp
                            <tr>
                                <td>{{ $log_spell->spell->name }}</td>
                                <td>{{ $log_spell->visits }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            @if (count($spellNames) > 0 && count($spellCounts) > 0)
                <div class="col-md-6">
                        <canvas id="spellsChart" width="500" height="310"></canvas>
                        <script>
                            var colors = [];
                            for(i=1; i<=10; i++){
                                var hex = Math.floor(Math.random()*16777215).toString(16);
                                colors.push('#'+hex);  
                            }
                            var xAxisLabelMinWidth = 15;
                            var ctx = document.getElementById('spellsChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'horizontalBar',

                                // The data for our dataset
                                data: {
                                    labels: {!! json_encode($spellNames) !!},
                                    datasets: [{
                                        label: 'Burtažodžių tipai',
                                        backgroundColor: colors,
                                        borderColor: colors,
                                        borderWidth: 1,
                                        data: {!! json_encode($spellCounts) !!}
                                    }]
                                },
                                
                                // Configuration options go here
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: false
                                    },
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                beginAtZero: true,
                                                stepSize: Math.round({!! json_encode($spellCounts[0]) !!} * 0.20)
                                            }
                                        }]
                                    }
                                }
                            });
                            function fitChart(){
                                var chartCanvas = document.getElementById('spellsChart');
                                var maxWidth = chartCanvas.parentElement.parentElement.clientWidth;
                                var width = Math.max(chart.data.labels.length * xAxisLabelMinWidth, maxWidth);

                                chartCanvas.parentElement.style.width = width +'px';
                            }
                            fitChart();
                        </script>
                </div>
            @endif
        @endif

    </div>

    <div class="row mx-0">
        @if ($log_searches_top->count() > 0)
            <div class="col-md-6">
                <div class="lead mb-3">TOP 10 paieškos užklausų</div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="bg-primary5">
                            <tr>
                                <th>Paieška</th>
                                <th>Apsilankymai</th>
                            </tr>
                        </thead>
                        @foreach ($log_searches_top as $log_search)
                            <tr>
                                <td>{{ $log_search->search }}</td>
                                <td>{{ $log_search->visits }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
        @if ($log_last_searches->count() > 0)
            <div class="col-md-6">
                <div class="lead mb-3">10 paskutinių paieškos užklausų</div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="bg-primary5">
                            <tr>
                                <th>Paieška</th>
                                <th>Apsilankymai</th>
                            </tr>
                        </thead>
                        @foreach ($log_last_searches as $log_search)
                            <tr>
                                <td>{{ $log_search->search }}</td>
                                <td>{{ $log_search->visits }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
    </div>

@endsection