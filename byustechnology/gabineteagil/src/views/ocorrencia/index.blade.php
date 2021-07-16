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

    <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary"><i class="fas fa-search fa-fw mr-1"></i> Buscar</a>
    <a href="#" class="btn btn-success"><i class="fas fa-file-csv fa-fw mr-1"></i> Exportar (CSV)</a>
    {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

    @component('gabinete::components.card')
        @if( ! $ocorrencias->isEmpty())
            
            <div class="table-responsive mt-3">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Ocorrência</th>
                            <th>Pessoa</th>
                            <th>Aberta em</th>
                            <th class="text-center">Etapa</th>
                            <th>Orgão</th>
                            <th>Assunto</th>
                            <th>Status</th>
                            <th class="table-actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ocorrencias as $ocorrencia)
                        <tr>
                            <td>
                                <a href="{{ url($ocorrencia->path()) }}"><strong>{{ $ocorrencia->titulo }}</strong></a><br>
                                <small class="text-muted">{{ Str::limit($ocorrencia->descricao, 100) }}</small>
                            </td>
                            <td>{{ optional($ocorrencia->pessoa)->titulo ?? 'Sem pessoa atrelada' }}</td>
                            <td>
                                {{ $ocorrencia->created_at->format('d/m/Y') }}<br>
                                <small class="text-muted">{{ $ocorrencia->created_at->diffForHumans() }}</small>
                            </td>
                            <td class="text-center"><span class="badge py-1 animate__animated animate__flash animate__infinite" style="background: {{ $ocorrencia->etapa->cor }}; color: {{ $ocorrencia->etapa->cor_texto }}">{{ $ocorrencia->etapa->titulo }}</span></td>
                            <td>{{ optional($ocorrencia->orgaoResponsavel)->titulo ?? 'Não informado' }}</td>
                            <td>{{ optional($ocorrencia->assunto)->titulo ?? 'Não informado' }}</td>
                            <td>{{ $ocorrencia->status->descricao }}<br><small class="text-muted">{{ $ocorrencia->status->data->diffForHumans() }}</small></td>
                            <td class="table-actions">
                                {!! Form::open(['url' => route('ocorrencia.destroy', ['ocorrencia' => $ocorrencia->id]), 'method' => 'delete']) !!}
                                <a data-toggle="tooltip" title="Editar" href="{{ route('ocorrencia.edit', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $ocorrencias->links() !!}
            
        @else
            @include('gabinete::components.no-results')
        @endif
    @endcomponent
</div>

@include('gabinete::ocorrencia.partials.search')
@endsection