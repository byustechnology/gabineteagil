@extends('gabinete::layouts.main')
@section('title', 'Ocorrências')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block mb-3 mt-4 h3">Ocorrências</h1>

@slot('actions')
<a href="{{ route('ocorrencia.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia')])
@endslot
@endcomponent

<div class="container-fluid">

    <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
    <a href="#" class="btn btn-outline-success mr-2"><i class="fas fa-file-csv fa-fw mr-2"></i> Exportar (CSV)</a>
    {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

    @component('ui::card')

        <!-- Tabs -->
        <nav class="navbar navbar-expand-lg navbar-light p-0 mb-3">
            <button class="border-0 btn-link btn-sm d-md-none" type="button" data-toggle="collapse" data-target="#tableNav"><i class="fas fa-filter fa-fw mr-2"></i> Filtrar registros</button>
            <div class="collapse navbar-collapse" id="tableNav">
                <ul class="nav nav-pills flex-column flex-sm-row mt-3 mt-md-0">
                    <li class="nav-item"><a class="nav-link btn-sm {!! request()->has('abertas') ? 'active' : null !!}" href="{{ route('ocorrencia.index', ['abertas' => 1]) }}">Em aberto</a></li>
                    <li class="nav-item"><a class="nav-link btn-sm {!! request()->has('concluidas') ? 'active' : null !!}" href="{{ route('ocorrencia.index', ['concluidas' => 1]) }}">Concluídas</a></li>
                    <li class="nav-item"><a class="nav-link btn-sm {!! request()->has('canceladas') ? 'active' : null !!}" href="{{ route('ocorrencia.index', ['canceladas' => 1]) }}">Canceladas</a></li>
                    <li class="nav-item"><a class="nav-link btn-sm {!! request()->has('atrasadas') ? 'active' : null !!}" href="{{ route('ocorrencia.index', ['atrasadas' => 1]) }}">Atrasadas</a></li>
                </ul>
            </div>
        </nav>
        <hr>

        @if( ! $ocorrencias->isEmpty())
            
            <div class="table-responsive mt-3">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>Ocorrência</th>
                            <th class="text-center">Etapa</th>
                            <th>Aberta em</th>
                            <th>Assunto/Orgão</th>
                            <th>Status</th>
                            <th class="table-actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ocorrencias as $ocorrencia)
                        <tr>
                            <td>
                                <a href="{{ url($ocorrencia->path()) }}"><strong>{{ $ocorrencia->tipo }}, {{ optional($ocorrencia->pessoa)->titulo ?? 'Sem pessoa atrelada' }}</strong></a><br>
                                <small class="text-muted">
                                    {{ $ocorrencia->bairro }} - {{ $ocorrencia->cidade }}/{{ $ocorrencia->estado }}<br>
                                    
                                </small>
                            </td>
                            <td class="text-center">
                                <span class="badge py-1 animate__animated animate__flash animate__infinite" style="background: {{ $ocorrencia->etapa->cor }}; color: {{ $ocorrencia->etapa->cor_texto }}">{{ $ocorrencia->etapa->titulo }}</span><br>
                                @if ( ! $ocorrencia->ultima_etapa and ! $ocorrencia->concluida())
                                    <a href="#" data-toggle="modal" data-target="#m-avancar-listagem" data-url="{{ route('ocorrencia.etapa.avancar', ['ocorrencia' => $ocorrencia]) }}" data-protocolo="{{ $ocorrencia->protocolo }}"><small>Avançar etapa <i class="fas fa-arrow-right fa-fw"></i></a></a>
                                @endif
                            </td>
                            <td>
                                {{ $ocorrencia->created_at->format('d/m/Y') }}<br>
                                <small class="text-muted">{{ $ocorrencia->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                {{ optional($ocorrencia->assunto)->titulo ?? 'Não informado' }}<br>
                                <small>{{ optional($ocorrencia->orgaoResponsavel)->titulo ?? 'Não informado' }}</a>
                            </td>
                            <td>{{ $ocorrencia->status->descricao }}<br><small class="text-muted">{{ $ocorrencia->status->data->diffForHumans() }}</small></td>
                            <td class="table-actions" rowspan="2">
                                {!! Form::open(['url' => route('ocorrencia.destroy', ['ocorrencia' => $ocorrencia->id]), 'method' => 'delete']) !!}
                                <a data-toggle="tooltip" title="Editar" href="{{ route('ocorrencia.edit', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link confirm-delete"><i class="far fa-trash-alt fa-fw"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="border-0 py-1 bg-light">
                                <a href="{{ route('ocorrencia.arquivo.index', ['ocorrencia' => $ocorrencia]) }}"><small>Arquivos</small></a>
                                <a href="{{ route('ocorrencia.mensagem.index', ['ocorrencia' => $ocorrencia]) }}" class="ml-2"><small>Mensagens</small></a>
                                <small class="ml-2"> - {{ Str::limit(strip_tags($ocorrencia->descricao), 100) }}</small>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $ocorrencias->links() !!}
            
        @else
            @include('ui::no-results')
        @endif
    @endcomponent
</div>

@include('gabinete::ocorrencia.partials.search')
@include('gabinete::ocorrencia.partials.avancar-listagem')
@endsection