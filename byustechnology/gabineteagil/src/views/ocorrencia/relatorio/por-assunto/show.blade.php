@extends('gabinete::layouts.main')
@section('title', 'Relatório de ocorrências por assunto')
@section('content')

@component('gabinete::layouts.title')

    <h1 class="d-block mb-3 mt-4 h3">Ocorrências</h1>

    @slot('breadcrumbs')
        @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-relatorio-por-assunto-show')])
    @endslot
@endcomponent

<div class="container-fluid">

    @if ($assuntos->count())
        @foreach($assuntos as $assunto => $ocorrencias)
            @component('ui::card')
                @slot('title')
                    {{ $assunto }}
                @endslot

                <div class="table-responsive">
                    <table class="table table-hover table-striped table-nowrap">
                        <thead>
                            <tr>
                                <th>Ocorrência</th>
                                <th class="text-center">Etapa</th>
                                <th>Aberta em</th>
                                <th>Orgão</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ocorrencias as $ocorrencia)
                                <tr>
                                    <td>
                                        <a href="{{ url($ocorrencia->path()) }}"><strong>{{ $ocorrencia->tipoOcorrencia->titulo }}, {{ optional($ocorrencia->pessoa)->titulo ?? 'Sem pessoa atrelada' }}</strong></a><br>
                                        <small class="text-muted">
                                            {{ $ocorrencia->bairro }} - {{ $ocorrencia->cidade }}/{{ $ocorrencia->estado }}<br>
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge py-1" style="background: {{ $ocorrencia->etapa->cor }}; color: {{ $ocorrencia->etapa->cor_texto }}">{{ $ocorrencia->etapa->titulo }}</span><br>
                                    </td>
                                    <td>
                                        {{ $ocorrencia->created_at->format('d/m/Y') }}<br>
                                        <small class="text-muted">{{ $ocorrencia->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td>{{ optional($ocorrencia->orgaoResponsavel)->titulo ?? 'Não informado' }}</td>
                                    <td>{{ $ocorrencia->status->descricao }}<br><small class="text-muted">{{ $ocorrencia->status->data->diffForHumans() }}</small></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endcomponent
        @endforeach
    @else
        @component('ui::card')
            @include('ui::no-results')
        @endcomponent
    @endif

</div>

@endsection