@extends('gabinete::layouts.main')
@section('meta')
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <h2 class="h2 d-block">Dashboard</h2>
        <p>Acompanhe as informações mais relevantes da aplicação no seu <i>dashboard</i></p>


        <div class="row">
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Ocorrencia::abertas()->count() }}</strong>
                        <div>
                            <h5 class="m-0">Ocorrências em aberto</h5>
                            <a href="{{ route('ocorrencia.index', ['abertas' => 1]) }}">Visualizar ocorrências</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Ocorrencia::abertas()->whereDate('created_at', '<=', today())->count() }}</strong>
                        <div>
                            <h5 class="m-0">Abertas há 01 dia</h5>
                            <a href="{{ route('ocorrencia.index', ['abertaHa' => 1]) }}">Visualizar ocorrências</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm bg-danger text-white">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Ocorrencia::atrasadas()->count() }}</strong>
                        <div>
                            <h5 class="m-0">Ocorrências em atraso</h5>
                            <a href="{{ route('ocorrencia.index', ['atrasadas' => 1]) }}" class="text-white">Visualizar ocorrências</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-eq-height">
            <div class="col-lg-7">
                @component('ui::card')
                    @slot('title')
                        Ocorrências encerradas por dia
                    @endslot

                    @include('gabinete::dashboard.charts.ocorrencias-encerradas-por-dia')
                @endcomponent
            </div>
            <div class="col-lg-5">
                @component('ui::card')
                    @slot('title')
                        Ações rápidas
                    @endslot

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link bg-light mb-2 rounded active" href="{{ route('pessoa.create') }}">Adicionar pessoa</a>
                            <a class="nav-link bg-light mb-2 rounded active" href="{{ route('ocorrencia.create') }}">Adicionar ocorrência</a>
                            <a class="nav-link bg-light mb-2 rounded active" href="{{ route('agenda.index') }}">Gerenciar agenda</a>
                            <a class="nav-link bg-light mb-2 rounded active" href="{{ route('usuario.index') }}">Gerenciar usuários</a>
                        </li>
                    </ul>
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                @component('ui::card')
                    @slot('title')
                        Ocorrências por bairro
                    @endslot

                    @include('gabinete::dashboard.charts.ocorrencias-por-bairro')
                @endcomponent
            </div>
            <div class="col-lg-8">
                @component('ui::card')
                    @slot('title')
                        Minhas ocorrências
                    @endslot

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach(\ByusTechnology\Gabinete\Models\Ocorrencia::limit(10)->get() as $ocorrencia)
                                <tr>
                                    <td><a href="{{ url($ocorrencia->path()) }}"><strong>{{ $ocorrencia->tipoOcorrencia->titulo }}, {{ optional($ocorrencia->pessoa)->titulo ?? 'Sem pessoa atrelada' }}</strong></a><br></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endcomponent
            </div>
        </div>
    </div>
@endsection